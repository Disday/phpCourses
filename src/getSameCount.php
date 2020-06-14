<?php

use function Funct\Collection\flatten;

function getSameCount($arr1, $arr2)
{
    $unique = array_unique(array_intersect($arr1, $arr2));
    return count($unique);
}




// echo getSameCount([], []); // 0
var_dump(getSameCount([4, 4], [4, 4])); // 1
echo getSameCount([1, 10, 3], [10, 100, 35, 1]), "\n"; // 2
echo getSameCount([1, 3, 2, 2], [3, 1, 1, 2]); // 3