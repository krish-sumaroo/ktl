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

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

//error
Route::get('hello', function()
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


Route::post('upload', ['uses' => 'UploadController@upload']);

Route::post('uploadTest', ['uses' => 'AssetController@uploadTest']);

Route::post('imageUpload', ['uses' => 'UploadController@upload']);
Route::post('imageDelete', ['uses' => 'UploadController@remove']);

Route::resource('book','BookController');
Route::get('book/upTest', ['uses' => 'BookController@upTest']);
Route::post('book/details', ['uses' => 'BookController@show']);
Route::get('book/details/{id}', ['uses' => 'BookController@show']);

//Route::resource('tags','TagController');
Route::get('tags/list', ['uses' => 'TagController@all']);
Route::post('tags/add',['uses' => 'TagController@add']);
Route::get('tags/test', ['uses' => 'TagController@testView']);
Route::post('tags/validate', ['uses' => 'TagController@validateSave']);
Route::post('tags/decline', ['uses' => 'TagController@decline']);

Route::get('tags/admin', ['uses' => 'TagController@validate']);

//Route::controller('post','PostController');
Route::get('post', ['uses' => 'PostController@index']);
//Route::get('post/products', ['uses' => 'PostController@products']);
Route::post('post/products', ['uses' => 'PostController@products']);

Route::resource('magazine','MagazineController');
Route::post('book/details', ['uses' => 'MagazineController@show']);
Route::get('book/details', ['uses' => 'MagazineController@show']);