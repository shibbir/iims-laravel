<?php

Route::get('/', 'DashboardController@index')->before('auth');
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index'])->before('auth');

Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

Route::get('/organization', 'OrganizationsController@index')->before('auth');
Route::post('/organization/update', 'OrganizationsController@update')->before('auth');