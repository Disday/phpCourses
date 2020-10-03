<?php

namespace Clock\states;

require __DIR__ . '/../../../../vendor/autoload.php';

use Clock\AlarmClock;

class BellState implements State
{
    private $clock;
    public function __construct(AlarmClock $clock)
    {
        $this->clock = $clock;
    }
    public function incrementH()
    {
    }
    public function incrementM()
    {
    }
    public function tick()
    {
        $clock = &$this->clock;
        $clock->minutes += 1;
        $clock->setState(ClockState::class);
    }
}
