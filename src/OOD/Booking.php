<?php
require __DIR__ . '/../../vendor/autoload.php';

use Carbon\Carbon;

class Booking
{
  public $bookedPeriods = [];
  public function book($startDate, $endDate)
  {
    $startDate = new Carbon($startDate);
    $endDate = new Carbon($endDate);
    if ($startDate->gte($endDate)){
      return false;
    }
    $isPeriodAvaliable = array_reduce($this->bookedPeriods, function ($acc, $elem) use ($startDate, $endDate) {
      if ($acc === false) {
        return false;
      }
      [$bookedStart, $bookedEnd] = $elem;
      if ($startDate->lt($bookedEnd) && $endDate->gt($bookedStart)) {
        return false;
      }
      return true;
    }, true);

    if ($isPeriodAvaliable) {
      $this->bookedPeriods[] = [$startDate, $endDate]; // make booking
    }
    return $isPeriodAvaliable;
  }
}


$booking = new Booking;



function assertTrue($a){
var_dump(true == $a);
}
function assertFalse($a){
  var_dump(false == $a);
  }
  
$result0 = $booking->book('10-11-2008', '05-11-2008');
        assertFalse($result0);

        $result1 = $booking->book('11-11-2008', '13-11-2008');
        assertTrue($result1);

        $result2 = $booking->book('12-11-2008', '12-11-2008');
        assertFalse($result2);

        $result3 = $booking->book('10-11-2008', '12-11-2008');
        assertFalse($result3);

        $result4 = $booking->book('12-11-2008', '14-11-2008');
        assertFalse($result4);
// print_r($booking);
        $result5 = $booking->book('10-11-2008', '11-11-2008');
        assertTrue($result5);

        $result55 = $booking->book('12-11-2008', '13-11-2008');
        assertFalse($result55);

        $result6 = $booking->book('13-11-2008', '13-11-2008');
        assertFalse($result6);

        $result7 = $booking->book('13-11-2008', '14-11-2008');
        assertTrue($result7);

        $result8 = $booking->book('08-11-2008', '18-11-2008');
        assertFalse($result8);

        $result9 = $booking->book('08-05-2008', '18-05-2008');
        assertTrue($result9);

        $result10 = $booking->book('09-05-2008', '10-05-2008');
        assertFalse($result10);

        $result11 = $booking->book('08-05-2008', '20-05-2008');
        assertFalse($result11);

        $result12 = $booking->book('07-05-2008', '18-05-2008');
        assertFalse($result12);

        $result13 = $booking->book('08-05-2008', '18-05-2008');
        assertFalse($result13);