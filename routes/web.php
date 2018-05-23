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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('task', 'TaskController');

Route::group(['namespace' => 'Auth'], function () {
    Route::get('register', ['as' => 'getRegister', 'uses' => 'RegisterController@getRegister']);
    Route::post('register', ['as' => 'postRegister', 'uses' => 'RegisterController@postRegister']);
    Route::get('login', ['as' => 'showloginform', 'uses' => 'LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login', 'uses' => 'LoginController@Login']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
});


