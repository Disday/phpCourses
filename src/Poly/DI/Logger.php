<?php

namespace App;
require __DIR__ . '/../../../vendor/autoload.php';

class Logger implements LoggerInterface
{
    public function info($message)
    {
        echo $message;
    }
}
