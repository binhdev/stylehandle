<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Post;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
    }

    public function index(){
        $posts=Post::orderBy('updated_at')->paginate(20);
        return View('home')->withPosts($posts);
    }
    public function show($slug){
        $post=Post::where('slug',$slug)->first();
        return View('show')->withPost($post);
    }
}
