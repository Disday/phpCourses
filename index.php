<?php
function sayPrimeOrNot($num)
{
  $result = primeOrNot($num) ? 'yes' : 'no';
  print_r($result);
}
function primeOrNot($num)
{
  if($num <= 1) return false;
  for ($i = 2; $i < $num; $i += ($num % $i)) {
    echo $i, ' ', "\n";
    if ($num % $i === 0) {
      return false;
    }
  }
  return true;
}
sayPrimeOrNot(11);
