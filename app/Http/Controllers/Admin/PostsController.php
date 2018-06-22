<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use App\Seo;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts=Post::where('active',1)->with('categories')->with('tags')->paginate(20);
        // if($request->has('category')){
        //     $cat=$request->get('category');
        //     $posts->whereHas('categories', function($query) use ($cat){
        //       $query->where('id', $cat);
        //     });
        // }
        // $posts->paginate(20);
        return View('admin.posts.home')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderBy('created_at','asc')->get();
        return View('admin.posts.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $post= new Post();
        // kiem tra Title, duplicate title is not good for seo
        if(Post::where('title',trim($request->get('title')))->first())
          return back()->withMessage("The Title is exist. Duplicate title is not good for Seo. Please choose new Title.");

        $post->title = trim($request->get('title'));
        $post->slug= str_slug($post->title,"-");
        $slug=$post->slug;
        $i=1;
        while(Post::where('slug',$slug)->first()){
             $slug=$post->slug."-".$i++;
        }
        $post->slug=$slug;
        $post->body = trim($request->get('body'));
        $post->thumbnail=$request->get('thumbnail');
        $post->thumbnail=$request->get('thumbnail');
        $post->author_id = $request->user()->id;
        if($request->has('save')) {
           $post->active = 0;
           $message = 'Post saved successfully';
       }
       else {
            $post->active = 1;
            $message = 'Post published successfully';
        }
        $post->save();
        if($request->has('categories')){
            foreach($request->get('categories') as $row) {
                $post->categories()->attach($row);
            }
        }
        if($request->has('tags')){
            foreach($request->get('tags') as $row) {
                $tag=Tag::where('name',trim($row))->first();
                if(!$tag){
                    $tag=new Tag();
                    $tag->name=trim($row);
                    $slug = str_slug($tag->name,"-");
                    $tag->slug= $slug;
                    $i=0;
                    while(Tag::where('slug',$slug)->first()){
                          $slug=$tag->slug."-".$i++;
                    }
                    $tag->slug= $slug;
                    $tag->save();
                }
                if(!$tag->posts->contains($post->id))
                  $post->tags()->attach($tag->id);
            }
        }
        $seo= new Seo();
        if($request->has('seo_title')&&$request->get('seo_title')){
            $seo->title=$request->get('seo_title');
        }
        else{
            $seo->title=$post->title;
        }
        if($request->has('seo_description')&&$request->get('seo_description')){
            $seo->description=$request->get('seo_description');
        }
        else{
            $seo->description=str_limit($post->body);
        }
        if($request->has('share_image')&&$request->get('share_image')){
            $seo->share_image=$request->get('share_image');
        }
        else{
            $seo->share_image=$post->thumbnail;
        }
        if($request->has('share_url')){
            $seo->share_url=$request->get('share_url');
        }
        else{
            $seo->share_url=null;
        }
        // $seo->save();
        if($post->seo){
           if($post->seo()->update($seo->toArray()))
               $message="success";
           else
               $message="error";
       }
       else{
           if($post->seo()->updateOrCreate($seo->toArray()))
                 $message="success";
           else
                 $message="error";
       }
        $post->seo()->updateOrCreate($seo->toArray());
        return redirect('/admin/posts')->withMessage($message);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat=Category::find(1)->toArray();
        $categories=Category::orderBy('created_at','asc')->get();
        // dd(in_array($cat,$categories->toArray()));
        $post= Post::with(['seo','categories','tags'])->find($id);

        return View('admin.posts.edit')->withPost($post)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request){
        $searchStr=$request->get('searchStr');
        // return $searchStr;
        return Post::where('title','like','%'.$searchStr.'%')->orderBy('created_at')->take(10)->get();
        // return "test";
    }
}
