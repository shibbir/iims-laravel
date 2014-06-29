<?php namespace IIMS\Forms;

class SalesInvoice extends FormValidator {
    protected $rules = [
        'customer_id'  => 'required',
        'products'  => 'required'
    ];
}