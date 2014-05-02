<?php namespace IIMS\Forms;

class Customer extends FormValidator {
    protected $rules = [
        'first_name' => 'required',
        'last_name'  => 'required',
        'address'    => 'required'
    ];
}