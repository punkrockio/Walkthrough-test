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

Route::get('/', 'HomeController@getHomepage');

Route::get('home', 'HomeController@getHomepage');

Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);


/*
Route::get('/post', 'PostController@index');
Route::get('/post/create', 'PostController@create');
Route::post('/post', 'PostController@store');
Route::get('/post/{id}', 'PostController@show');
Route::get('/post/{id}/edit', 'PostController@edit');
Route::put('/post/{id}', 'PostController@update');
Route::delete('/post/{id}', 'PostController@destroy');
*/
Route::resource('/post', 'PostController');
Route::get('/post/create',['middleware' => 'auth', 'uses' => 'PostController@create']);


Route::get('/authour/login', 'AuthourController@getLogin');
Route::post('/authour/login', 'AuthourController@postLogin');
Route::get('/authour/logout', 'AuthourController@logout');

Route::get('/authour/{id}/post', 'AuthourController@showPosts');
Route::resource('/authour', 'AuthourController');

