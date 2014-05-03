<?php

Event::listen('illuminate.query', function($sql)
{
    //var_dump($sql);
});

# Dashboard
Route::get('/', 'DashboardController@index')->before('auth');
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index'])->before('auth');

# Session
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

# User
Route::get('profile', ['as' => 'profile', 'uses' => 'UsersController@profile']);
Route::resource('users', 'UsersController');

# Organization
Route::resource('organizations', 'OrganizationsController', ['only' => ['show', 'update']]);

# Customer
Route::resource('customers', 'CustomersController');

# Product
Route::resource('products', 'ProductsController');

# Category
Route::resource('categories', 'CategoryController');

# Supplier
Route::resource('suppliers', 'SuppliersController');