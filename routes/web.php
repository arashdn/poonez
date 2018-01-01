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
    return response()->download(Config::get('global.post.image.path').DIRECTORY_SEPARATOR."37ecd521670c014aa2ad.jpg", null, [], null);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/all', 'PostController@all')->name('ajax.post.all');

Route::group(['middleware'=> ['auth']], function (){
    Route::get('/post/add', 'PostController@add')->name('post.add');
    Route::post('/post/add','PostController@store')->name('post.store');
});