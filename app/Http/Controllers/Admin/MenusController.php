<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Post;
use App\Menulink;
use Illuminate\Routing\UrlGenerator;


class MenusController extends Controller
{
    protected $url;

    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }
    public function methodName()
    {
        $this->url->to('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $menus=Menu::orderBy('created_at')->get();
        return View('admin.menus.home')->withPosts($menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name= $request->get('name');
        $slug = str_slug($name);
        $category=Menu::where('name',$name)->orWhere('slug',$slug)->get();
        if(count($category)!=0)
          return back()->withErrors('Menu name or slug already exists. Please input new');
        $menu=new Menu();
        $menu->name=$name;
        $menu->slug=$slug;
        if($menu->save()){
          return back()->withMessage('Created menu.');
        }
        return back()->withErrors('Can\'t create menu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Menu::find($id)->with('menulinks')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // dsdsfsdjklf
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
    public function addLinkPosts(Request $request){
        // dd($this->url->to('/'));
        $idPosts=$request->get('idPosts');
        $menu_id=$request->get('menuid');
        $menu=Menu::find($menu_id);
        if(!$menu)
          return back()->withErrors("Menu not found.");
        foreach($idPosts as $row) {
            $post=Post::find($row);
            if($post){
                $menulink= new Menulink();
                $menulink->name=$post->title;
                $menulink->parent_id=0;
                $menulink->sort=0;
                $menulink->url=$this->url->to("/")."/".$post->slug;
                $menu->menulinks()->create($menulink->toArray());
            }
        }
        return back()->withMessage('Add Post to menu');
    }
}
