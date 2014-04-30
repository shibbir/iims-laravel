<?php namespace IIMS\Models;

class Product extends \Eloquent {

    protected $table = 'products';

    protected $fillable = ['categoryId', 'title', 'description', 'quantity', 'warranty', 'unitPrice', 'isAvailable'];
}