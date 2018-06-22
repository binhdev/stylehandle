<?php
Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');
Auth::routes();
// group for panel login user role admin

Route::group(['prefix'=>'admin','middleware' => ['admin']], function(){
    Route::POST('/upload-image','Admin\HomeController@upload_image');
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
    Route::resource('crawlbots','Admin\CrawlBotController');
});

Route::get('/','HomeController@index');
Route::get('/{slug}',['as' => 'post', 'uses' => 'HomeController@show'])->where('slug', '[A-Za-z0-9-_]+');


Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{

  Route::get('/','HomeController@index');
    Route::get('{category_slug}/{slug}',['as' => 'post', 'uses' => 'HomeController@show'])->where('category_slug', '[A-Za-z0-9-_]+')->where('slug', '[A-Za-z0-9-_]+');
    Route::get('/{slug}',['as' => 'post', 'uses' => 'HomeController@showInCategory'])->where('slug', '[A-Za-z0-9-_]+');
    Route::get('category/{slug}',['as' => 'post', 'uses' => 'PostController@showInCategory'])->where('slug', '[A-Za-z0-9-_]+');
    Route::get('tags/{slug}',['as' => 'post', 'uses' => 'PostController@showInTag'])->where('slug', '[A-Za-z0-9-_]+');
    Route::get('tag/{slug}',['as' => 'post', 'uses' => 'PostController@showInTag'])->where('slug', '[A-Za-z0-9-_]+');

});
