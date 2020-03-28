<?php
require __DIR__ . './vendor/autoload.php';

function makeRational($numer, $denom)
{
    return "{$numer}/{$denom}";
}
echo makeRational(1, 2);