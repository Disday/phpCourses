<?php

namespace App\Inheritance;

require __DIR__ . '/../../vendor/autoload.php';


class HTMLElement
{
    private $body;

    public function setTextContent($body)
    {
        $this->body = $body;
    }

    public function __toString()
    {
        $tag = static::$params['name'];
        $body = $this->body;
        return static::$params['pair'] ? "<{$tag}>{$body}</{$tag}>" : "<{$tag}>";
    }
}

$element = new HTMLBrElement();
echo $element; // => '<br>'
$element = new HTMLDivElement();
$element->setTextContent('hello!');
echo $element; // => '<div>hello!</div>'