<?php namespace IIMS\Models;

class ProductMetadata extends \Eloquent {

    protected $table = 'product_metadata';

    protected $fillable = ['product_id', 'serial', 'is_available'];
}