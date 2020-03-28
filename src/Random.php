<?php
class Random
{
  private $current;
  private $seed;
  public function getNext()
  {
    $this->current = (7 * $this->current + 6) % 10;
    return $this->current;
  }
  public function __construct($seed)
  {
    $this->current = $seed;
    $this->seed = $seed;
  }
  public function reset(){
    $this->current = $this->seed;
  }
}

$seq = new Random(5);
$result1 = $seq->getNext();
$result2 = $seq->getNext();
$seq->reset();
$result3 = $seq->getNext();
$result4 = $seq->getNext();

echo $result1, "\n", $result2, "\n", $result3, "\n", $result4;