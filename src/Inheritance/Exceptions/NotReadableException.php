<?php

namespace App\Inheritance\Exceptions;

require __DIR__ . '/../../../vendor/autoload.php';

class NotReadableException extends FileException
{
    protected $message = 'File is not readable';
}
