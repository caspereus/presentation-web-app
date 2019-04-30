<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/user');
});

Route::group(['prefix'=>'user'],function(){
	Route::get('/','VisitorsController@form_show');
	Route::post('form_save','VisitorsController@user_save');
	Route::get('logout','VisitorsController@user_logout');
	Route::get('about','PresentatorController@user_profile');
	Route::get('contact','PresentatorController@contact');
	Route::get('/article','ArticleController@user_article');
	Route::get('/article/{id}','ArticleController@user_article_detail');
	Route::get('/event','EventController@user_event');
	Route::get('/event/{id}','EventController@user_event_detail');
	Route::get('event/download/{id}','EventFileController@download_update_web');
	Route::get('/gallery','GalleryController@user_gallery');
	Route::get('/gallery/{id}','GalleryController@user_gallery_detail');
	Route::get('/video','VideoController@user_video');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'visitors','middleware'=>'auth'],function(){
	Route::get('/','VisitorsController@index');
});

Route::group(['prefix'=>'presentator','middleware'=>'auth'],function(){
	Route::get('/','PresentatorController@index');
	Route::get('add','PresentatorController@add');
	Route::post('store','PresentatorController@store');
	Route::get('edit/{id}','PresentatorController@edit');
	Route::patch('update/{id}','PresentatorController@update');
});

Route::group(['prefix'=>'category','middleware'=>'auth'],function()
{
	Route::get('/','CategoryController@index');
	Route::post('store','CategoryController@store');
	Route::get('delete/{id}','CategoryController@delete');
});

Route::group(['prefix'=>'event','middleware'=>'auth'],function()
{
	Route::get('/','EventController@index');
	Route::get('add','EventController@add');
	Route::post('store','EventController@store');
	Route::get('delete/{id}','EventController@delete');
	Route::get('edit/{id}','EventController@edit');
	Route::patch('updates/{id}','EventController@update');
});

Route::group(['prefix'=>'article','middleware'=>'auth'],function()
{
	Route::get('/','ArticleController@index');
	Route::get('add','ArticleController@add');
	Route::post('store','ArticleController@store');
	Route::get('delete/{id}','ArticleController@delete');
	Route::get('edit/{id}','ArticleController@edit');
	Route::patch('updates/{id}','ArticleController@update');
});

Route::group(['prefix'=>'gallery','middleware'=>'auth'],function(){
	Route::view('/add','gallery.add');
	Route::post('/store','GalleryController@store');
	Route::get('/','GalleryController@index');
	Route::get('/detail/{id}','GalleryController@detail');
	Route::get('/delete/{id}','GalleryController@delete');
	Route::get('/imagedelete/{id}','GalleryController@imagedelete');
	Route::get('/addmore/{id}','GalleryController@addmore');
	Route::post('/moreupdates/{id}','GalleryController@moreupdates');
});

Route::group(['prefix'=>'video','middleware'=>'auth'],function(){
	Route::view('add','video.add');
	Route::post('save','VideoController@save');
	Route::get('/','VideoController@show');
	Route::get('edit/{id}','VideoController@edit');
	Route::patch('update/{id}','VideoController@update');
	Route::get('delete/{id}','VideoController@delete');
});

Route::get('like/{post_id}/{type}','LikeController@see_data');

Route::get('app/download',function(){
	return response()->download(public_path('files/ihsanfirdaus.apk'));
});

