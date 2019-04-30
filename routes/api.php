<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'visitors'],function(){
	Route::post('/create','VisitorsController@create');
});

Route::group(['prefix'=>'presentator'],function(){
	Route::get('/data','PresentatorController@data');
	Route::get('/article','PresentatorController@main_article');
	Route::get('/event','PresentatorController@main_event');
});

Route::group(['prefix'=>'event'],function(){
	Route::get('/','EventController@data');
	Route::get('/view_count/{id}','EventController@view_count');
});

Route::group(['prefix'=>'event_file'],function(){
	Route::get('/{id}','EventFileController@desc');
	Route::get('download/{id}','EventFileController@download_update');
});

Route::group(['prefix'=>'article'],function(){
	Route::get('/','ArticleController@data');
	Route::get('/view_count/{id}','ArticleController@view_count');
});

Route::group(['prefix'=>'gallery'],function(){
	Route::get('/','GalleryController@apidata');
	Route::get('/detail/{id}','GalleryController@apidetail');
	Route::get('/view_count/{id}','GalleryController@view_count');
});

Route::group(['prefix'=>'video'],function(){
	Route::get('/','VideoController@apidata');
	Route::get('/view_count/{id}','VideoController@view_count');
});

Route::group(['prefix'=>'like'],function()
{
	Route::get('/{post_id}/{user_id}/{type}','LikeController@do_like');
	Route::get('check/{post_id}/{user_id}/{type}','LikeController@check');
	Route::get('un/{post_id}/{user_id}/{type}','LikeController@unlike');
});
