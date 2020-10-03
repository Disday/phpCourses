<?php

namespace App\Inheritance;

require __DIR__ . '/../../vendor/autoload.php';

class SanitizerStripTagsDecorator implements SanitizerInterface
{
    public function __construct(Sanitizer $baseSanitizer)
    {
        $this->baseSanitizer = $baseSanitizer;
    }
    
    public function sanitize($string)
    {
        $tagsStripped = strip_tags($string);
        return $this->baseSanitizer->sanitize($tagsStripped);
    }
}

$baseSanitizer = new Sanitizer();
$sanitizer = new SanitizerStripTagsDecorator($baseSanitizer);
echo $sanitizer->sanitize('<>tsdext   '); // 'text'