<?php

namespace qwe;

require_once 'Trees.php';

use function Trees\mkdir;
use function Trees\mkfile;
use function Trees\isFile;

function downcaseFileNames($tree)
{
  $dfs = function ($tree) use (&$dfs) {
    $newTree = $tree;
    if (isFile($tree)) {
      $newTree['name'] = strtolower($tree['name']);
      return $newTree;
    }
    $newTree['children'] = array_map($dfs, $tree['children']);
    return $newTree;
  };
  return $dfs($tree);
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

// $res = map(function ($n) {
//   return array_merge($n, ['name' => strtoupper($n['name'])]);
// }, $tree);
// print_r($res);