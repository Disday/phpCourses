<?php
// require_once 'Segment.php';
class Rational
{
  public $numer;
  public $denom;
  function __construct($numer, $denom){
     $this->numer = $numer;
     $this->denom = $denom;
  }
  public function getNumer(){
    return $this->numer;
  }
  public function getDenom(){
    return $this->denom;
  }
  public function add($x){
    $commonDenom = $this->denom * $x->denom;
    $thisNumer =  $x->denom * $this->numer;
    $xNumer = $this->denom * $x->numer;
    return new Rational($thisNumer + $xNumer, $commonDenom);
  }
  public function sub($x){
    $commonDenom = $this->denom * $x->denom;
    $thisNumer =  $x->denom * $this->numer;
    $xNumer = $this->denom * $x->numer;
    return new Rational($thisNumer - $xNumer, $commonDenom);
  }
}

$rat1 = new Rational(3, 9);
$rat2 = new Rational(10,3);
print_r($rat1->add($rat2));
print_r($rat1->sub($rat2));
