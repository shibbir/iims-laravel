<?php namespace IIMS\Models;

class Category extends \Eloquent {

    protected $table = 'categories';

    protected $fillable = ['title', 'description'];

    public function products()
    {
        return $this->hasMany('IIMS\Models\Product');
    }
}