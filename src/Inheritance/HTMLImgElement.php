<?php

namespace App\Inheritance;

require __DIR__ . '/../../vendor/autoload.php';

class HTMLImgElement extends HTMLElement
{
    private const ATTRIBUTE_NAMES = ['src'];

    public function isValid()
    {
        $validAttributes = array_merge(self::ATTRIBUTE_NAMES, parent::getAttributeNames());
        $attributesKeys = array_keys($this->attributes);
        return empty(array_diff($attributesKeys, $validAttributes));
    }
}
