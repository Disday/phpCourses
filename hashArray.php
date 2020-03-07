<?php
function make(){
  return [];
}
function set(&$map, $key, $value){
  $hash = crc32($key) % 1000;
  // print_r("{$hash} \n");
  if( !empty($map[$hash]) && $map[$hash][0] !== $key ){
  // echo 'error', "\n";
  return false;
  }
  $map[$hash] = [$key, $value];
  return true;
}

function get($map, $key, $default = null){
  $hash = crc32($key) % 1000;
  if (isset($map[$hash]) && $map[$hash][0] === $key) {
    return $map[$hash][1];
  }
  return $default;
}

$map = make();

set($map, 'aaaaa0.462031558722291', 'vvv');
set($map, 'aaaaa0.0585754039730588', 'boom!');

print_r($map);
 $result = get($map, 'aaaaa0.462031558722291');
var_dump($result);
 $result = get($map, 'aaaaa0.0585754039730588');
var_dump($result);