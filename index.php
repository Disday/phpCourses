<?php
// use Funct\Collection;

$last = function(string $str){
    return strlen($str) < 1 ? null : $str[strlen($str) - 1];
};
var_dump($last(''));