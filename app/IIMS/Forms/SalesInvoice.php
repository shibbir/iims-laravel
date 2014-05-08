<?php namespace IIMS\Forms;

class SalesInvoice extends FormValidator {
    protected $rules = [
        'invoice_id' => 'required|unique:sales',
        'customer_id'  => 'required'
    ];
}