<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::controller('users','UserController');

Route::get('login', ['uses' => 'HomeController@showLogin']);

Route::post('login', ['uses' => 'HomeController@doLogin']);

Route::post('logout', ['uses' => 'HomeController@doLogout']);



Route::resource('admin', 'AssetController');
Route::post('admin/products', ['uses' => 'AssetController@products']);
Route::post('admin/addProduct', ['uses' => 'AssetController@addProduct']);


Route::resource('books','BookController');
