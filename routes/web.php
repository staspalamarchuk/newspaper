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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/create_post', 'HomeController@createPost')->name('createPost');

Route::get('/post/{id}', 'PostController@show')->name('post.show');
Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');


Route::post('/create_post', 'PostController@create')->name('post.create');
Route::post('/post/{id}/edit', 'PostController@update')->name('post.update');

Route::delete('/post/{id}', 'PostController@destroy')
    ->name('post.destroy');
?>
