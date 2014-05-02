<?php namespace IIMS\Exceptions;

use Illuminate\Support\MessageBag;

class FormValidationException Extends \Exception {

    protected $errors;

    function __construct($message, MessageBag $errors)
    {
        $this->errors = $errors;
        parent::__construct($message);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}