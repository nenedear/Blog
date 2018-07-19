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
    return view('welcome');
});
Route::get('/', 'PostsController@index')->name('index');
Auth::routes();

Route::get('posts/{post}', 'PostsController@show')->name('post');
Route::post('posts', 'PostsController@create')->name('create');
Route::get('posts', 'PostsController@create');