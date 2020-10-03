<?php

namespace App\Inheritance\Exceptions;

require __DIR__ . '/../../../vendor/autoload.php';

class NotExistsException extends FileException
{
    protected $message = 'File does not exist';
}