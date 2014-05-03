<?php namespace IIMS\Forms;

class Product extends FormValidator {
    protected $rules = [
        'category_id' => 'required',
        'title'       => 'required|unique:products',
        'quantity'    => 'integer',
        'unit_price'  => 'required'
    ];
}