<?php
require __DIR__ . '/../../vendor/autoload.php';

function normalize($cities)
{
  $normalized = collect($cities)
    ->map(function ($city) {
      return array_map(function ($item) {
        return trim($item);
      }, $city);
    })
    ->map(function ($city) {
      return array_map(function ($item) {
        return strtolower($item);
      }, $city);
    });
  return $normalized->unique()
    ->mapToGroups(function ($city, $key) {
      return [$city['country'] => $city['name']];
    })
    ->sortKeys()
    ->map(function ($country) {
      return $country->sort()->values();
    })
    ->toArray();
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
  [
      'name' => 'istambul',
      'country' => 'usa'
  ],
];
print_r(normalize($raw));
