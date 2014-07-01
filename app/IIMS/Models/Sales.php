<?php namespace IIMS\Models;

class Sales extends \Eloquent {

    protected $table = 'sales';

    protected $fillable = ['invoice_id', 'customer_id', 'service_charge', 'vat', 'discount', 'total_amount', 'net_payable_amount'];
}