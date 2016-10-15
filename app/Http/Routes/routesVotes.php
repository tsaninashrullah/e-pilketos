<?php

Route::get('votes', 'VotingController@index')->name('index');
Route::post('votes_store', 'VotingController@store')->name('store');