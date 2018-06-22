<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Post;

class HomeController extends Controller
{
    private $site_name;
    private $folder_name;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->site_name=str_replace("www.","",str_after(App::make('url')->to('/'),'//'));
        $this->folder_name = str_replace('.', '_',   $this->site_name);
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
