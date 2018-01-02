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
//DB::listen(function ($event)
//{
//    dump($event->sql);
//    dump($event->bindings);
//});


Route::get('/test', function () {
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/all', 'PostController@all')->name('ajax.post.all');
Route::get('/post/show/{id?}','PostController@show')->name('post.show');
Route::get('/post/image/{id?}','PostController@image')->name('post.image');
Route::get('/post/thumbnail/{id?}','PostController@thumbnail')->name('post.thumbnail');


Route::group(['middleware'=> ['auth']], function (){
    Route::get('/post/add', 'PostController@add')->name('post.add');
    Route::post('/post/add','PostController@store')->name('post.store');
    Route::post('/post/edit','PostController@edit')->name('post.edit');
});