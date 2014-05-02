<?php namespace IIMS\Forms;

class User extends FormValidator {
    protected $rules = [
        'username' => 'required|unique:users',
        'name'     => 'required',
        'email'    => 'required|email|unique:users'
    ];
}