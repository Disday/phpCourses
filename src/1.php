<?php
$a = 1;
$b = 2;
$a = $b;

$b = &$a;

echo $a, "\n", $b;