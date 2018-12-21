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
    return view('index');
});

Auth::routes();

//Post routes
Route::get('/home', 'PostsController@index')->name('posts');
Route::get('/posts/create', 'PostsController@create')->name('create');
Route::put('/posts', 'PostsController@store')->name('store');
Route::get('/posts/{post}', 'PostsController@show')->name('show');
