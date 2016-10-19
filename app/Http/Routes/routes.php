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


Route::get('user-profile', function () {
    return view('users.profile');
});
Route::group(['middleware' => 'back'], function () {
	Route::get('/','UsersController@home')->name('home');
	Route::get('show_candidate/{id}', 'VotingController@show_candidate')->name('show_candidate');
});

Route::get('logout', 'AuthenticateController@logout');

Route::group(['middleware' => 'admin'], function () {
});
Route::group(['middleware' => 'teacher'], function () {
	Route::get('dashboard','VotingController@indexDashboard');
});