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
Route::get('/posts', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create')->name('create');
Route::get('/posts', 'PostsController@store')->name('store');
Route::get('/posts/{post}', 'PostsController@show')->name('show');
Route::patch('/posts/{post}/edit', 'PostsController@edit')->name('edit');
Route::delete('/posts/{post}', 'PostsController@destroy')->name('destroy');
