<?php

namespace App\Inheritance;
require __DIR__ . '/../../vendor/autoload.php';


class HTMLDivElement extends HTMLPairElement
{
    protected $tagName = 'div';
    // protected function getTagName()
    // {
    //     return 'div';
    // }

}

$div = new HTMLDivElement(['name' => 'div', 'data-toggle' => 'true']);
$div->setTextContent('Body');
echo $div; // '<div name="div" data-toggle="true">Body</div>'

