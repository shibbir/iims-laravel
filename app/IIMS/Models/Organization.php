<?php namespace IIMS\Models;

class Organization extends \Eloquent {

    protected $table = 'organizations';

    protected $fillable = ['title', 'sub_title', 'mobile', 'phone', 'address', 'description', 'email', 'website'];
}