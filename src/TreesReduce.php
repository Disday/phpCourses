<?php

namespace qwe;

require_once 'Trees.php';

use function Trees\mkdir;
use function Trees\mkfile;
use function Trees\isFile;
use function Trees\isDirectory;

function reduce($f, $tree, $acc)
{
  $reduce = function ($f, $tree, $acc) use (&$reduce) {
    $children = $tree['children'] ?? null;
    $newAcc = $f($acc, $tree);
    if (!$children) {
      return $newAcc;
    }
    return array_reduce(
      $children,
      function ($iAcc, $elem) use (&$reduce, &$f) {
        return $reduce($f, $elem, $iAcc);
      }, $newAcc);
  };
  return $reduce($f, $tree, $acc);
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

// reduce(function ($acc) {
//   return $acc + 1;
// }, $tree, 0);

$res = reduce(function ($acc) {
  return $acc + 1;
}, $tree, 0);
$res2 = reduce(function ($acc, $node) {
  return isFile($node) ? $acc + 1 : $acc;
}, $tree, 0);

print_r($res);
echo "\n";
print_r($tree);
