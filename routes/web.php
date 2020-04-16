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

Route::get('/privacy-policy', function () {
    return view('policy');
});

Route::get('/terms-of-service', function () {
    return view('policy');
});

Route::post('historial/create', 'RecordController@store')->name('record.store');
Route::group(['middleware' => ['auth']], function () {
	// Record
	Route::get('historial', 'RecordController@index')->name('record');
	Route::post('historial/remove', 'RecordController@remove')->name('record.remove');
	Route::post('historial', 'RecordController@getRecord')->name('record.paginate');
	// Config
	Route::post('config', 'UserController@update')->name('config');
	// Password
	Route::post('passowrd/change', 'UserController@changePassword')->name('password.change');
	//Module Administrator
	Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function(){
	    Route::get('/', 'AdminController@index');
	    Route::get('usuarios', 'UserController@index');
	    Route::get('encriptaciones', 'RecordController@adminIndex');
	    Route::get('logs', 'AdminController@logs');
	    // Chart
	    Route::get('lineUsers', 'AdminController@lineUsers')->name('lineUsers');
	    Route::get('usersRegisters', 'AdminController@usersRegisters');
	});
});
// Login facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
// Login Google
Route::get('login/google', 'Auth\LoginController@googleRedirectToProvider')->name('google');
Route::get('login/google/callback', 'Auth\LoginController@googleHandleProviderCallback');
// Login Routes
Route::get('ingresar/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('registro/', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register/', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.request.reset');



