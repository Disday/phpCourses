<?php

namespace Poly;

require __DIR__ . '/../../vendor/autoload.php';

function swapKeyValue($db)
{
  $swapped = array_flip($db->toArray());
  foreach ($db->toArray() as $key => $value):
    $db->unset($key);
  endforeach;
  
  foreach ($swapped as $key => $value) :
    $db->set($key, $value);
  endforeach;
  return $db;
}

$map = new InMemoryKV(['foo' => 'bar', 'bar' => 'zoo']);
// $map->set('key2', 'value2');
var_dump(swapKeyValue($map));
