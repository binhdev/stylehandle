<?php
use App\Menu;
function getSiteName(){
    $site_name=str_replace("www.","",str_after(App::make('url')->to('/'),'//'));
    return $site_name;
}

function getMenu($slug){
    return Menu::where('slug',$slug)->orderBy('sort')->get();
}
