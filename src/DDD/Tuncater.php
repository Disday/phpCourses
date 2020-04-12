<?php

namespace App;

class Truncater
{
  public const OPTIONS = [
    'separator' => '...',
    'length' => 200,
  ];
  private $options = [];
  public function __construct($options = [])
  {
    $this->options = array_merge(self::OPTIONS, $options);
  }
  public function truncate($str, $options = [])
  { 
    $currentOptions = array_merge($this->options, $options);
    if (strlen($str) <= $currentOptions['length']) {
      $result = $str;
    } else $result = substr_replace($str, $currentOptions['separator'], $currentOptions['length']);
    return $result;
  }
}

$truncater = new Truncater();
print_r($truncater->truncate('one two', ['length' => 6]));
echo "\n";

print_r($truncater->truncate('one two', ['separator' => '']));
