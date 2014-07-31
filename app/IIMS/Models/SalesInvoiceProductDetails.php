<?php namespace IIMS\Models;

class SalesInvoiceProductDetails extends \Eloquent {

    protected $table = 'sales_invoice_product_details';

    protected $fillable = ['invoice_id', 'product_id', 'warranty', 'selling_price', 'quantity'];

    public function product()
    {
        return $this->hasOne('IIMS\Models\Product', 'id');
    }
}