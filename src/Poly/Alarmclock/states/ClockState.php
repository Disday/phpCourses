<?php

namespace Clock\states;

require __DIR__ . '/../../../../vendor/autoload.php';

// use Clock\states\State;
use Clock\AlarmClock;

class ClockState implements State
{
    private $clock;
    public function __construct(AlarmClock $clock)
    {
        $this->clock = $clock;
    }
    public function incrementM()
    {
        $minutes = &$this->clock->minutes;
        $minutes += 1;
        if ($minutes === 60) {
            $minutes = 0;
        }
    }
    public function incrementH()
    {
        $hours = &$this->clock->hours;
        $hours += 1;
        if ($hours === 24) {
            $hours = 0;
        }
    }
    public function tick()
    {
        $clock = &$this->clock;
        $clock->minutes += 1;
        if ($clock->minutes === 60) {
            $clock->hours += 1;
            $clock->minutes = 0;
        }
        if ($clock->hours === 24) {
            $clock->hours = 0;
        }
        if ($clock->isAlarmOn() && $clock->isAlarmTime()) {
            $clock->setState(BellState::class);
        }
    }
}
