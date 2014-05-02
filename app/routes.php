<?php

# Dashboard
Route::get('/', 'DashboardController@index')->before('auth');
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index'])->before('auth');

# Session
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

# User
Route::resource('users', 'UsersController');

# Organization
Route::resource('organizations', 'OrganizationsController', ['only' => ['show', 'update']]);

# Customer
Route::resource('customers', 'CustomersController');

# Product
Route::resource('products', 'ProductsController');