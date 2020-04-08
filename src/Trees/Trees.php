<?php
namespace Trees;

function mkdir($name, $content = []){
  return ['name' => $name , 'type' => 'directory', 'meta' => [], 'children' => $content];
}
function mkfile($name, $meta){
  return ['name' => $name, 'type' => 'file', 'meta' => $meta];
}
function isFile($file){
  return $file['type'] === 'file';
}
function isDirectory($dir){
  return $dir['type'] === 'directory';
}
// $a = mkdir('asd');
// print_r($a);
// var_dump( isDirectory($a));