<?php namespace IIMS\Forms;

class Supplier extends FormValidator {
    protected $rules = [
        'company_name' => 'required|unique:suppliers',
        'phone'        => 'unique:suppliers',
        'mobile'       => 'unique:suppliers',
        'email'        => 'email|unique:suppliers',
        'website'      => 'url|unique:suppliers',
        'address'      => 'required'
    ];
}