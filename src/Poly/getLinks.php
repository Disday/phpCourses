<?php

use function Funct\false;

function getLinks($tags)
{
    $keys = [
        'img' => 'src',
        'a' => 'href',
        'link' => 'href'
    ];
    $links = [];
    foreach ($tags as $tag) :
        $linkAttr = $keys[$tag['name']] ?? null;
        if ($linkAttr) {
            $links[] = $tag[$linkAttr];
        }
        // print_r($res);
    endforeach;
    return $links;
}

$tags = [
    ['name' => 'img', 'src' => 'hexlet.io/assets/logo.png'],
    ['name' => 'div'],
    ['name' => 'link', 'href' => 'hexlet.io/assets/style.css'],
    ['name' => 'h1']
];
print_r(getLinks($tags));
