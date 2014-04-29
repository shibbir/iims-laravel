<?php namespace IIMS\Forms;

class Customer extends FormValidator {
    protected $rules = [
        'firstName' => 'required',
        'lastName' => 'required',
        'address' => 'required'
    ];
}