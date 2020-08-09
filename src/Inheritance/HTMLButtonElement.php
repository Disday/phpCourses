<?php

namespace App\Inheritance;

require __DIR__ . '/../../vendor/autoload.php';

class HTMLButtonElement extends HTMLElement
{
    private const ATTRIBUTE_NAMES = ['type'];
    private const VALID_TYPES = ['button', 'submit', 'reset'];

    public function isValid()
    {
        $validAttributes = array_merge(self::ATTRIBUTE_NAMES, parent::getAttributeNames());
        $attributesKeys = array_keys($this->attributes);
        $type = $this->attributes['type'] ?? null;
        $isTypeValid = $type && in_array($type, self::VALID_TYPES);
        return empty(array_diff($attributesKeys, $validAttributes)) && $isTypeValid;
    }
}

$button1 = new HTMLButtonElement(['class' => 'rounded', 'type' => 'button']);
var_export($button1->isValid()); // true

$button2 = new HTMLButtonElement(['class' => 'rounded']);
var_export($button2->isValid()); // true