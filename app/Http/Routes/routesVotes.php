<?php
Route::group(['middleware' => 'auth'], function () {
	Route::get('votes', 'VotingController@index')->name('index');
	Route::post('votes_store/{id}', 'VotingController@store')->name('store');
});