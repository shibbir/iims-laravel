<?php namespace IIMS\Models;

class Organization extends \Eloquent {

    protected $table = 'organizations';

    protected $fillable = ['title', 'subTitle', 'mobile', 'phone', 'address', 'description', 'email', 'website'];
}