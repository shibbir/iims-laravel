<?php namespace IIMS\Models;

class Product extends \Eloquent {

    protected $table = 'products';

    protected $fillable = ['category_id', 'supplier_id', 'title', 'description', 'quantity', 'warranty', 'unit_price', 'is_available'];

    public function category()
    {
        return $this->belongsTo('IIMS\Models\Category');
    }

    public function supplier()
    {
        return $this->belongsTo('IIMS\Models\Supplier');
    }
}