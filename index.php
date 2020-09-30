<?php

function reverse($number)
{
    return $number > 0 ? (int)strrev(abs($number)) : (int) -strrev(abs($number));
}
var_dump(reverse('123456'));
new info 
