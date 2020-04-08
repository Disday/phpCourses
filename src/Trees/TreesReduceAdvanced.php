<?php

namespace qwe;

require_once 'Trees.php';

use function Trees\mkdir;
use function Trees\mkfile;
use function Trees\isFile;
use function Trees\isDirectory;

function du($dir)
{
  $countVolume = function ($elem, $acc = 0) use (&$countVolume) {
    if (isFile($elem)) {
      $acc += $elem['meta']['size'];
      return $acc;
    }
    return array_reduce($elem['children'], function ($iAcc, $n) use (&$countVolume) {
      return $countVolume($n, $iAcc);
    }, $acc);
  };

  $dirs = array_map(function ($elem) use (&$countVolume) {
    return [$elem['name'], $countVolume($elem)];
  }, $dir['children']);
  
  usort($dirs, function ($a, $b) {
    return $b[1] > $a[1] ? 1 : -1;
  });
  return $dirs;
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
  mkfile('resolve', ['size' => 111000]),
]);

$res = du($tree);

print_r($res);
// print_r($tree);
