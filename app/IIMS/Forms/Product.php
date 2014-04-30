<?php namespace IIMS\Forms;

class Product extends FormValidator {
    protected $rules = [
        'categoryId' => 'required',
        'title' => 'required'
    ];
}