<?php namespace IIMS\Models;

class Sales extends \Eloquent {

    protected $table = 'sales';

    protected $fillable = ['invoice_id', 'customer_id'];
}