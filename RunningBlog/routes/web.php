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

Route::get('/about', "userController@aboutMe");
Route::get('/mycources', "userController@cources");
Route::get('/galiry', "userController@getGaliry");
Route::resource('/posts', "postsController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
