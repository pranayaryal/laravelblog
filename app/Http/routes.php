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



Route::get('about', 'PagesController@about');

Route::get('/', 'PagesController@index');
Route::get('contact', 'PagesController@contact');

Route::resource('articles', 'ArticlesController');

Route::get('tags/{tags}', 'TagsController@show');

Route::controllers([

	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'

]);



Route::get('auth/logout', 
	array('as' => 'auth.logout', 
		'uses' => 'Auth\AuthController@getLogout'));

Route::get('auth/login', 
	array('as' => 'auth.login', 
		'uses' => 'Auth\AuthController@getLogin'));

Route::get('auth/register', 
	array('as' => 'auth.register', 
		'uses' => 'Auth\AuthController@getRegister'));



Route::get('foo', ['middleware' => 'manager', function()
{
	return 'this page may be only viewed by managers';
}]);


