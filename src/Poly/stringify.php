<?php
require __DIR__ . '/../../vendor/autoload.php';

function stringify($tag)
{
  $buildAttrs = function ($tag) {
    return collect($tag)->except(['tagType', 'body', 'name'])
      ->map(fn ($item, $key) => " {$key}=\"{$item}\"")
      ->implode('');
  };
  $name = $tag['name'];
  $attrs = $buildAttrs($tag);
  $buildSingleTag = fn ($tag) => "<{$name}{$attrs}>";
  $buildPairTag = fn ($tag) => "<{$name}{$attrs}>{$tag['body']}</{$tag['name']}>";
  $mapping = [
    'single' => fn ($tag) => $buildSingleTag($tag),
    'pair' => fn ($tag) => $buildPairTag($tag)
  ];
  $handler = $mapping[$tag['tagType']];
  return $handler($tag);
}

$tag = ['name' => 'hr', 'class' => 'px-3', 'id' => 'myid', 'tagType' => 'single'];
$html = stringify($tag);
print_r($html);
echo "\n";
$tag = ['name' => 'div', 'tagType' => 'pair', 'body' => 'text2', 'id' => 'wow'];
$html = stringify($tag);
print_r($html);
echo "\n";
$tag = ['name' => 'div', 'tagType' => 'pair', 'body' => 'text2'];
$html = stringify($tag);
print_r($html);
