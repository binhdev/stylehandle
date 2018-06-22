<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Photo;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return View('admin.home');
    }

    public function upload_image(Request $request){
        $image = $request->file('image');
        $name=$image->getClientOriginalName();
        $filename = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $img = Image::make($image->getRealPath());
        $img->fit(600, 421, function ($constraint) {
            $constraint->upsize();
        })->save($destinationPath.'/'.$filename);

        // create photo
        $photo= new Photo();
        $photo->title=$name;
        $photo->slug=str_slug($name).time();
        $photo->url='/uploads'.'/'.$filename;
        $photo->save();
        return json_encode('/uploads'.'/'.$filename);
    }
}
