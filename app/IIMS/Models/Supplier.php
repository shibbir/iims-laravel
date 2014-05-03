<?php namespace IIMS\Models;

class Supplier extends \Eloquent {

    protected $table = 'suppliers';

    protected $fillable = ['company_name', 'phone', 'mobile', 'email', 'website', 'fax', 'address'];

    public function products()
    {
        return $this->hasMany('Product');
    }
}