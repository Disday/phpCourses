<?php

namespace qwe;

require_once 'Trees.php';

use function Trees\mkdir;
use function Trees\mkfile;
use function Trees\isFile;
use function Trees\isDirectory;

function map($func, $tree)
{
  $map = function ($tree) use (&$map, $func) {
    $children = $tree['children'] ?? NULL;
    $newTree = $func($tree);
    if (empty($children)) {
      return $newTree;
    }
    $newTree['children'] = array_map($map, $children);
    return $newTree;
  };
  return $map($tree);
}

$tree = mkdir('/', [
  mkdir('eTc', [
    mkdir('NgiNx'),
    mkdir('CONSUL', [
      mkfile('config.json'),
    ]),
  ]),
  mkfile('hOsts'),
]);

$res = map(function ($n) {
  return array_merge($n, ['name' => strtoupper($n['name'])]);
}, $tree);

print_r($res);
// print_r($tree);
