<?php namespace IIMS\Models;

class Sales extends \Eloquent {

    protected $table = 'sales';

    protected $fillable = ['invoice_id', 'customer_id', 'service_charge', 'vat', 'discount', 'total_amount', 'net_payable_amount', 'created_by'];

    public function user()
    {
        return $this->hasOne('IIMS\Models\User', 'id', 'created_by');
    }

    public function customer()
    {
        return $this->hasOne('IIMS\Models\Customer', 'id');
    }
}