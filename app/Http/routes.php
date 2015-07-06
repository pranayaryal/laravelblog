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





//Route::get('/', 'TodoListController@index');
Route::get('/', function(){
	return View::make('todos.welcome');
});
Route::get('/home', 'TodoListController@index');

Route::resource('todos', 'TodoListController');
Route::resource('todos.items', 'TodoItemController', ['except'=> ['index']]);
Route::patch('/todos/{todos}/items/{items}/complete', 
	['as' => 'todos.items.complete', 'uses' => 'TodoItemController@complete']);
// Authentication routes...
//Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/login', 
	array('as' => 'auth.login', 
		'uses' => 'Auth\AuthController@getLogin'));

Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 
	array('as' => 'auth.logout', 
		'uses' => 'Auth\AuthController@getLogout'));
//Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 
	array('as' => 'auth.register', 
		'uses' => 'Auth\AuthController@getRegister'));
//Route::get('auth/register', 'Auth\AuthController@getRegister');

Route::post('auth/register', 'Auth\AuthController@postRegister');
// Event::listen('illuminate.query', function($query){
// 	var_dump($query);
// });



