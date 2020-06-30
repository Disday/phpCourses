<?php

use function Funct\Strings\length;

function swap($arr, $swapCenter)
{
    if ($swapCenter > 0 && $swapCenter < count($arr) - 1) {
        $before = $swapCenter - 1;
        $after = $swapCenter + 1;
        [$arr[$before], $arr[$after]] = [$arr[$after], $arr[$before]];
        // $temp = $before;
        // $before = $after;
        // $after = $temp;
    }
    return $arr;
}

$names = ['john', 'smith', 'karl'];
$result = swap($names, 1);
// print_r($result); // => ['karl', 'smith', 'john']

// $result = swap($names, 2);
print_r($result); // => ['john', 'smith', 'karl']

// $result = swap($names, 0);
// print_r($result); // => ['john', 'smith', 'karl']