<?php

namespace App\Inheritance;
require __DIR__ . '/../../vendor/autoload.php';

// BEGIN (write your solution here)
class HTMLDivElement extends HTMLElement
{
    protected static $params = [
        'name' => 'div',
        'pair' => true
    ];
}
// END

// $div = new HTMLDivElement(['name' => 'div', 'data-toggle' => 'true']);
// $div->setTextContent('Body');
// echo $div; // '<div name="div" data-toggle="true">Body</div>'

