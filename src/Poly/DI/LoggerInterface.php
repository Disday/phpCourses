<?php

namespace App;
require __DIR__ . '/../../../vendor/autoload.php';


interface LoggerInterface
{
    public function info(string $message);
}
