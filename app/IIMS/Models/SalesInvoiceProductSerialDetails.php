<?php namespace IIMS\Models;

class SalesInvoiceProductSerialDetails extends \Eloquent {

    protected $table = 'sales_invoice_product_serial_details';

    protected $fillable = ['invoice_id', 'invoice_product_details_id', 'product_id', 'serial'];
}