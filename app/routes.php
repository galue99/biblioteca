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

Route::get('/', 'HomeController@index');

Route::get('/search', 'HomeController@searchs');
Route::post('/search', 'HomeController@search');


Route::resource('/user', 'UserController');
Route::group(array('before' => 'auth'), function()
{
	Route::get('/dashboard', 'HomeController@dashboard');
	Route::resource('/book', 'BookController');
	
	Route::get('/prestamos', 'HomeController@prestamos');
	Route::post('/prestamo', 'HomeController@prestamo');
	Route::get('/logout',    'HomeController@logout');
	Route::get('/reporteUsuarios', 'HomeController@reporteUsuarios');

});

Route::get('login', 'HomeController@showLogin');
Route::post('login', 'HomeController@postLogin');