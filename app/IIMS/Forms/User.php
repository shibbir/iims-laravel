<?php namespace IIMS\Forms;

class User extends FormValidator {
    protected $rules = [
        'username'              => 'required|alpha_num|unique:users',
        'password'              => 'required|alpha_num|between:6,15|confirmed',
        'password_confirmation' => 'required|alpha_num|between:6,15',
        'name'                  => 'required',
        'address'               => 'required',
        'email'                 => 'required|email|unique:users'
    ];
}