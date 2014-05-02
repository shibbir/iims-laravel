<?php namespace IIMS\Models;

class Product extends \Eloquent {

    protected $table = 'products';

    protected $fillable = ['category_id', 'title', 'description', 'quantity', 'warranty', 'unit_price', 'is_available'];
}