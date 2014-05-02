<?php namespace IIMS\Models;

class Category extends \Eloquent {

    protected $table = 'categories';

    protected $fillable = ['title', 'description'];
}