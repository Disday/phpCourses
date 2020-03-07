<?php
require_once 'Point.php';

class Segment
{
  public $beginPoint;
  public $endPoint;
  public function __construct($x, $y)
  {
    $this->beginPoint = $x;
    $this->endPoint = $y;
  }
  public function __toString(){
     return "[{$this->beginPoint}, {$this->endPoint}";
}
}
$x = new Segment(new Point(1, 4), new Point(3,6));
echo $x;