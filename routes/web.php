<?php

Auth::routes();

// group for panel login user role admin
Route::POST('/upload-image','Admin\HomeController@upload_image');
Route::group(['prefix'=>'admin'], function(){
    Route::resource('/','Admin\HomeController');
    Route::POST('posts/search','Admin\PostsController@search');
    Route::resource('posts','Admin\PostsController');
    Route::resource('categories','Admin\CategoriesController');
    Route::resource('tags','Admin\TagsController');
    Route::POST('menus/addlink/posts','Admin\MenusController@addLinkPosts');
    Route::resource('menus','Admin\MenusController');
    Route::resource('menulinks','Admin\MenulinksController');
    Route::resource('sites','Admin\SitesController');
    Route::get('sites/delete/{id}','Admin\SitesController@destroy')->where('id','[0-9]+');
    Route::get('photos/all','Admin\PhotosController@getAll');
    Route::resource('photos','Admin\PhotosController');
});

Route::get('/','HomeController@index');
Route::get('/{slug}',['as' => 'post', 'uses' => 'HomeController@show'])->where('slug', '[A-Za-z0-9-_]+');
