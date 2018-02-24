<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@root_index');

Route::get('/road-map', function () {
    return view('road-map');
});

Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@home');
Route::get('/books', 'BookController@index');

Route::resource('user','UserController@index');
Route::resource('book','BookController@index');
Route::resource('category','CategoryController');


