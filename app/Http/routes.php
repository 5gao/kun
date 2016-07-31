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

/*Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/
Route::get('/', function () {
	return view('index');
});
Route::get('api/user/list','UserController@getList');
Route::post('api/user/login','UserController@login');
Route::get('api/user/save','UserController@save');
Route::get('api/plan/add','PlanController@add');
Route::get('api/plan/list','PlanController@getList');