<?php

namespace Poly\TicTacToe;
// use Toe;
require __DIR__ . '/../../vendor/autoload.php';

function flatten($arr)
{
    $res = [];
    foreach ($arr as $elem) {
        if (is_array($elem)) {
            $res = [...$res, ...$elem];
        } else $res[] = $elem;
    }
    return $res;
}

// flatten([1, [3, 2], 9]); // [1, 3, 2, 9]
flatten([1, [[2], [3]], [9]]); // [1, [2], [3], 9]