<?php

Event::listen('illuminate.query', function($sql)
{
    //var_dump($sql);
});

# Dashboard
Route::get('/', 'DashboardController@index')->before('auth');
Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index'])->before('auth');

# Session
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

# User
Route::get('profile', ['as' => 'profile', 'uses' => 'UsersController@profile']);
Route::resource('users', 'UsersController');

# Organization
Route::get('organization', ['as' => 'organization', 'uses' => 'OrganizationController@show']);
Route::get('organization/edit', 'OrganizationController@edit');
Route::patch('organization', 'OrganizationController@update');

# Customer
Route::resource('customers', 'CustomersController');

# Category
Route::resource('categories', 'CategoryController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
Route::get('categories/{categories}/delete', 'CategoryController@delete');

# Product
Route::get('inventory', ['as' => 'inventory', 'uses' => 'ProductsController@inventory']);
Route::get('products/create', 'ProductsController@create');
Route::get('products/{product}/serial/{serial}', 'ProductMetadataController@verify');
Route::resource('categories.products', 'ProductsController');

# Supplier
Route::resource('suppliers', 'SuppliersController');

# Invoices
Route::resource('sales', 'SalesController', ['only' => ['index', 'create', 'store', 'show']]);
Route::resource('purchases', 'PurchasesController', ['only' => ['index', 'create', 'store', 'show']]);