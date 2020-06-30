<?php
function checkIfBalanced($str)
{
    $str = str_split($str);
    $brackets = [
        0 => '(',
        1 => ')'
    ];
    $result = [];
    foreach ($str as $char) {
        if ($char == $brackets[0]) {
            array_push($result, $char);
        } elseif ($char == $brackets[1]) {
            if (empty($result)) {
                return false;
            }
            array_pop($result);
        }
    }
    return empty($result);
}

var_dump(checkIfBalanced('))')); // true