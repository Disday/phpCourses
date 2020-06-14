<?php
require __DIR__ . '/../vendor/autoload.php';

function makeCensored($str, array $stops)
{
    $str = explode(' ', $str);
    $res = array_map(function ($word) use ($stops) {
        return in_array($word, $stops) ? '$#%!' : $word;
    }, $str);
    return implode(' ', $res);
}
print_r(makeCensored('When you play the game of thrones, you win or you die', ['die', 'play']));
