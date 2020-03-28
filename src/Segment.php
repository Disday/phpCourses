<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Point;
// print_r(Points\makeDecartPoint(1,2));
class Segment
{
  public $beginPoint;
  public $endPoint;
  public function __construct($x, $y)
  {
    $this->beginPoint = $x;
    $this->endPoint = $y;
  }
  public function __toString()
  {
    return "[{$this->beginPoint}, {$this->endPoint}";
  }
  public function some(){
    return __Class__;
  }
}
$x = new Segment(new Point(1, 4), new Point(3, 6));
echo Segment::class;
