<?php

namespace App\Inheritance;
require __DIR__ . '/../../vendor/autoload.php';

class HTMLBrElement extends HTMLElement
{
    protected static $params = [
        'name' => 'br',
        'pair' => false
    ];
}
