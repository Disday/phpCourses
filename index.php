<?php
function union($first, ...$rest)
{
  $merged = array_merge($first, ...$rest);
  $uniquied = array_unique($merged);
  $result = array_values($uniquied);
  return $result;
}
var_dump(union([3, 2], [2, 2, 1])); // ['a', 3, false, true, 5, 8]
