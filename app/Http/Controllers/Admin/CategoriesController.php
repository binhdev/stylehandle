<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
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
        $categories= Category::orderBy('created_at')->paginate(50);
        return View('admin.categories.home')->withPosts($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.categories.create');
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
      $category=Category::where('name',$name)->orWhere('slug',$slug)->get();
      if(count($category)!=0)
        return back()->withErrors('Category name or slug already exists. Please input new');
      $category=new Category();
      $category->name=$name;
      $category->slug=$slug;
      $category->description=$request->get('description');
      if($category->save()){
        return back()->withMessage('Created category.');
      }
      return back()->withErrors('Can\'t create category.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return View('admin.categories.edit')->withPost($category);
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
        Category::find($id)->update($request->all());
        return back()->withMessage('xong');
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
}
