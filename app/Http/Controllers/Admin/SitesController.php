<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Site;
use App\Option;
class SitesController extends Controller
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
    public function index()
    {
        $sites = Site::orderBy('created_at','asc')->paginate(20);
        return View('admin.sites.home')->withPosts($sites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Site::create($request->all());
        $name= $request->get('name');
        $slug = str_slug($name);
        $site=Site::where('name',$name)->orWhere('slug',$slug)->get();
        if(count($site)!=0)
          return back()->withErrors('Site name or slug already exists. Please input new');

        $site=new Site();
        $site->name=$name;
        $site->slug=$slug;
        $site->description=$request->get('description');
        if($site->save()){
          $option = new Option();
          $option->title = $site->name;
          $option->description = $site->description;
          $site->option()->save($option);
        }
        return back()->withMessage('Created site.');
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
        $site=Site::find($id);
        if($site){
            return View('admin.sites.edit')->withPost($site);
        }
        return back()->withErrors('Can\'t find this site.Please check againt.');
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
         $site= Site::find($id);
         // return $site->option;
         $option = new Options();
         $option->title = $request->get('title');
         $option->description = $request->get('description');
         $option->copyright = $request->get('copyright');
         $option->domain_verify = $request->get('domain_verify');
         $option->domain_analytic = $request->get('domain_analytic');
         $option->site_icon = $request->get('site_icon');
         $option->site_logo = $request->get('site_logo');
         if($site->option){
             if($site->option()->update($option->toArray()))
                 $message="Updated site option.";
             else
                 $message="Error! Can't update this option.";
         }
         else{
             if($site->option()->updateOrCreate($option->toArray()))
                   $message="Created site option.";
             else
                   $message="Error! Can't create this option.";
         }
         return back()->withMessage($message);

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site=Site::find($id);
        if(count($site->posts)!=0)
          return back()->withErrors('Can not delelte this site because it have many posts.');
        if($site->delete())
          return back()->withMessage('Deleted site.');
        else
          return back()->withErrors('Error deleted site.');
    }
}
