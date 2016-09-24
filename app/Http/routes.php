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
Route::post('api/user/list','UserController@getList');
Route::post('api/user/login','UserController@login');
Route::post('api/user/isLogin','UserController@isLogin');
Route::get('api/user/loginOut','UserController@loginOut');
Route::post('api/home/list','HomeController@getList');
Route::get('api/user/save','UserController@save');
Route::post('api/plan/add','PlanController@add');
Route::post('api/plan/list','PlanController@getList');
Route::post('api/plan/view','PlanController@view');
Route::post('api/plan/public/update','PlanController@updatePublic');
Route::post('api/plan/status/update','PlanController@updateStatus');
Route::post('api/plan/delete','PlanController@delete');
Route::post('api/collect/add','LikesController@addCollect');
Route::post('api/collect/likes','LikesController@addLikes');