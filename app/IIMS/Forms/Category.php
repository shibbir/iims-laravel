<?php namespace IIMS\Forms;

class Category extends FormValidator {
    protected $rules = [
        'title' => 'required|unique:categories'
    ];
}