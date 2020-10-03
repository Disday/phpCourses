<?php
require __DIR__ . '/../../vendor/autoload.php';
function compare($str1, $str2)
{
  $getResultedStack = function ($str) : object
  {
    $arr = str_split($str);
    $result = new Ds\Stack;
    foreach ($arr as $symbol) {
      if ($symbol === '#' && !$result->isEmpty()) {
        $result->pop();
      } elseif ($symbol !== '#') {
        $result->push($symbol);
      }
    }
    return $result;
  };
  return $getResultedStack($str1) == $getResultedStack($str2);
}



// var_dump(compare('ab#c', 'ab#c'));
// // 'ac' === 'ac'
// // echo compare('ab#c', 'ab#c'),  // true
// // // '' === ''
// var_dump(compare('ab##', 'c#d#')); // true
// // // 'c' === 'b'
var_dump(compare('a#c', 'b')); // false
// // 'cd' === 'cd'
var_dump(compare('#cd', 'cd')); // true
