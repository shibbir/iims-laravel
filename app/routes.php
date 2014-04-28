<?php

Route::get('/', 'DashboardController@index')->before('auth');
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index'])->before('auth');

Route::get('login', ['as' => 'login', 'uses' => 'SessionController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionController@destroy']);
Route::resource('sessions', 'SessionController', ['only' => ['create', 'store', 'destroy']]);

Route::resource('organizations', 'OrganizationController', ['only' => ['show', 'update']]);

Route::resource('customers', 'CustomerController');