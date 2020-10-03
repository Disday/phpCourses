<?php

namespace App\Inheritance;
require __DIR__ . '/../../vendor/autoload.php';


class HTMLPairElement extends HTMLElement
{
    protected $body;

    public function __toString()
    {
        $tagName = $this->tagName;
        $attributes = $this->stringifyAttributes();
        $body = $this->getTextContent();
        return "<{$tagName}{$attributes}>$body</{$tagName}>";
    }
    protected function getTextContent()
    {
        return $this->body;
    }
    public function setTextContent(string $body)
    {
        $this->body = $body;
    }

}


