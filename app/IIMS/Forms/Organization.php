<?php namespace IIMS\Forms;

class Organization extends FormValidator {
    protected $rules = [
        'title'     => 'required|unique:organizations',
        'sub_title' => 'required',
        'email'     => 'required|email|unique:organizations',
        'address'   => 'required'
    ];
}