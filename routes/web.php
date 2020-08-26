<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/posts', 'PostsController@index');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::patch('/posts/{post}', 'PostsController@update');

Route::get('/users', 'UsersController@index');
Route::get('/users/edit', 'UsersController@edit');
Route::get('/users/{user:username}', 'UsersController@show')->name('users.show');
Route::patch('/users', 'UsersController@update');
Route::post('/users/{user:username}/follow', 'FollowsController@store');
Route::delete('/users/{user:username}/unfollow', 'FollowsController@delete');
Auth::routes();
