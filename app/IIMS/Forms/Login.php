<?php namespace IIMS\Forms;

class Login extends FormValidator {
    protected $rules = [
        'username' => 'required',
        'password' => 'required'
    ];
}