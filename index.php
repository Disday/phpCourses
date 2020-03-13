<?php
<<<<<<< HEAD
function union($first, ...$rest)
{
  $merged = array_merge($first, ...$rest);
  $uniquied = array_unique($merged);
  $result = array_values($uniquied);
  return $result;
}
var_dump(union([3, 2], [2, 2, 1])); // ['a', 3, false, true, 5, 8]
=======
// use Funct\Collection;

$last = function(string $str){
    return strlen($str) < 1 ? null : $str[strlen($str) - 1];
};
var_dump($last(''));
>>>>>>> 8b2cbfd3a8172806553b1a47c914dc20ab6bc796
