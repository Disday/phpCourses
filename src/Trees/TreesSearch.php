<?php

namespace qwe;

require_once 'Trees.php';

use function Trees\mkdir;
use function Trees\mkfile;
use function Trees\isFile;
use function Trees\isDirectory;

function findFilesByName($tree, $str)
{
  $search = function ($elem, $acc, $path) use (&$search, $str) {
    $path[] = $elem['name'];
    if (isFile($elem) && strpos($elem['name'], $str) !== false) {
      $path = substr(implode('/', $path), 1);
      $acc[] = $path;
    }
    $children = $elem['children'] ?? null;
    if (!$children) {
      return $acc;
    }
    return array_reduce(
      $children,
      function ($iAcc, $n) use (&$search, &$path) {
        return $search($n, $iAcc, $path);
      },
      $acc
    );
  };

  return $search($tree, [], []);
}



$tree = mkdir('/', [
  mkdir('etc', [
    mkdir('apache'),
    mkdir('nginx', [
      mkfile('nginx.conf', ['size' => 800]),
    ]),
    mkdir('consul', [
      mkfile('config.json', ['size' => 1200]),
      mkfile('data', ['size' => 8200]),
      mkfile('raft', ['size' => 80]),
    ]),
  ]),
  mkfile('hosts', ['size' => 3500]),
  mkfile('resolve', ['size' => 1000]),
]);

$res = findFilesByName($tree, 'conf');

print_r($res);
print_r($tree);
