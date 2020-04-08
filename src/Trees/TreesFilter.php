<?php

namespace qwe;

require_once 'Trees.php';

use function Trees\mkdir;
use function Trees\mkfile;
use function Trees\isFile;
use function Trees\isDirectory;

function filter($f, $tree)
{
  $filter = function ($tree) use (&$f, &$filter) {
    if (!$f($tree)) {
      return NULL ;
    }
    $children = $tree['children'] ?? null;
    if (!$children) {
      return $tree;
    }
    $newChildren = array_map($filter, $children);
    $filtredChildren = array_values(array_filter($newChildren, function($elem) {
      return $elem !== NULL;
  }));
    $newTree = array_merge($tree, ['children' => $filtredChildren]);
    return $newTree;
  };
  return $filter($tree);
}



$tree = mkdir('/', [
  mkdir('etc', [
    mkdir('nginx', [
      mkdir('conf.d'),
    ]),
    mkdir('consul', [
      mkfile('config.json'), mkfile('1config.json')
    ]),
  ]),
  mkfile('hosts'),
]);

$res = filter(function ($n) {
  return isDirectory($n);
}, $tree);
// $res['children'][0]['children'][0] = 123;
print_r($res);
// print_r(array_filter($res, function ($elem) {
//   return $elem !== 123;
// }));
// print_r($tree);
