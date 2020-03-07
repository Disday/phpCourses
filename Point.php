<?php
class Point
{
  public $x;
  public $y;

  public function __construct($x, $y)
  {
    $this->x = $x;
    $this->y = $y;
  }
  public function __toString()
  {
    return "({$this->x}, {$this->y})";
  }
}
$x = new Point(1,4);
// echo $x;
