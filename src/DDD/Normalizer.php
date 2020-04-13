<?php
require __DIR__ . '/../../vendor/autoload.php';

function normalizer($cities){

}

$raw = [
  [
      'name' => 'istambul',
      'country' => 'turkey'
  ],
  [
      'name' => 'Moscow ',
      'country' => ' Russia'
  ],
  [
      'name' => 'iStambul',
      'country' => 'tUrkey'
  ],
  [
      'name' => 'antalia',
      'country' => 'turkeY '
  ],
  [
      'name' => 'samarA',
      'country' => '  ruSsiA'
  ],
];