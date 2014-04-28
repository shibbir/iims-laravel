<?php namespace IIMS\Models;

class Customer extends \Eloquent {

    protected $table = 'customers';

    protected $fillable = ['firstName', 'lastName', 'contact', 'address'];
}