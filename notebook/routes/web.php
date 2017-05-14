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

Route::get('/',[
	'uses' => 'DiaryController@getIndex',
	'as' => 'diary.index'
]);
Route::post('/signup',[
	'uses' => 'UserController@postSignUp',
	'as' => 'user.signup',
	'middleware' => 'guest'
]);

Route::get('/signin',[
	'uses' => 'UserController@getSignIn',
	'as' => 'user.signin',
	'middleware' => 'guest'
]);
Route::post('/signin',[
	'uses' => 'UserController@postSignIn',
	'as' => 'user.signin',
	'middleware' => 'guest'
]);
Route::post('/updatepost',[
	'uses' => 'UserController@postUpdate',
	'as' => 'user.update'
]);

Route::get('/welcome',[
	'uses' => 'UserController@getProfile',
	'as' => 'user.welcome',
	'middleware' => 'auth'
]);
Route::get('/logout',[
	'uses' => 'UserController@getLogout',
	'as' => 'user.logout',
	'middleware' => 'auth'
]);

