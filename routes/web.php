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


//\DB::connection( 'mongodb' )->enableQueryLog();
//DB::listen(function ($event)
//{
//    dump($event->sql);
//    dump($event->bindings);
//    dump($event->time);
//});

Route::get('/test', function () {
    $client = \Plastic::getClient();
    $params = [
        'index' => \Plastic::getDefaultIndex(),
//        'type' => 'posts',
        'body' => [
            'query' => [
                'multi_match' => [
                    'type' => "best_fields",
                    'query' => 'arash',
                    'fields' => ['title','content','name']
                ]
            ]
        ]
    ];
    $response = $client->search($params);
    dd($response);
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/post/all', 'PostController@all')->name('ajax.post.all');
Route::get('/post/show/{id?}','PostController@show')->name('post.show');
Route::get('/post/image/{id?}','PostController@image')->name('post.image');
Route::get('/post/thumbnail/{id?}','PostController@thumbnail')->name('post.thumbnail');


Route::group(['middleware'=> ['auth']], function (){
    Route::get('/post/add', 'PostController@add')->name('post.add');
    Route::post('/post/add','PostController@store')->name('post.store');
    Route::post('/post/edit','PostController@edit')->name('post.edit');
    Route::post('/post/delete/{id?}','PostController@delete')->name('post.delete');
    Route::post('/comment/add','CommentController@store')->name('comment.store');
});