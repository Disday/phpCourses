<?php

namespace App\Inheritance;

require __DIR__ . '/../../vendor/autoload.php';

class Sanitizer implements SanitizerInterface
{
    public function sanitize($string)
    {
        return trim($string);
    }
}
