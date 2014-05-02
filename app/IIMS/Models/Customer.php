<?php namespace IIMS\Models;

class Customer extends \Eloquent {

    protected $table = 'customers';

    protected $fillable = ['first_name', 'last_name', 'contact', 'address'];
}