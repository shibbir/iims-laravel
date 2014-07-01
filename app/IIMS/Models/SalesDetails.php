<?php namespace IIMS\Models;

class SalesDetails extends \Eloquent {

    protected $table = 'sales_invoice_details';

    protected $fillable = ['invoice_id', 'product_id', 'warranty', 'selling_price', 'serial'];
}