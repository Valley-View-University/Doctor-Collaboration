<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/random', function () {
    return view('posts.random');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Route::get('/posts', 'PostController@index');



//Route::post('posts/comment', 'PostController@comment');



Route::resource('posts','PostController');
Route::resource('posts.comment', 'CommentController');
