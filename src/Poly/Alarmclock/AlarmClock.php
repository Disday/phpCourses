<?php

namespace Clock;
require __DIR__ . '/../../../vendor/autoload.php';

// use AlarmClock\states\ClockState;

class AlarmClock
{
    public $minutes;
    public $hours;
    public $alarmMinutes;
    public $alarmHours;
    private $state;
    private $alarmOn = false;
    public function __construct()
    {
        $this->minutes = 0;
        $this->hours = 12;
        $this->alarmMinutes = 0;
        $this->alarmHours = 6;
        $this->setState(states\ClockState::class);
    }
    public function setState($stateName)
    {
        $this->state = new $stateName($this);
    }

    public function getMinutes()
    {
        return $this->minutes;
    }
    public function getHours()
    {
        return $this->hours;
    }
    public function getAlarmMinutes()
    {
        return $this->alarmMinutes;
    }
    public function getAlarmHours()
    {
        return $this->alarmHours;
    }
    public function getCurrentMode()
    {
        $stateClass = get_class($this->state);
        $stateClass = array_reverse(explode("\\", $stateClass))[0];
        $map = ['ClockState' => 'clock',
        'AlarmState' => 'alarm',
        'BellState' => 'bell'];
        return $map[$stateClass];

    }
    public function isAlarmOn()
    {
        return $this->alarmOn;
    }
    public function isAlarmTime()
    {
        return $this->hours === $this->alarmHours && $this->minutes === $this->alarmMinutes;
    }
    public function clickMode()
    {
        $this->getCurrentMode() === 'clock' ? $this->setState(states\AlarmState::class) : $this->setState(states\ClockState::class);
    }
    public function longClickMode()
    {
        $this->alarmOn ? $this->alarmOn = false : $this->alarmOn = true;
    }
    public function clickH()
    {
        $this->state->incrementH();
    }
    public function clickM()
    {
        $this->state->incrementM();
    }
    public function tick()
    {
        $this->state->tick();
    }

}

$clock = new AlarmClock();
// $clock->clickMode();
// $clock->clickMode();
// $clock->clickM();
// $clock->clickM();
// $clock->clickH();
// $clock->clickM();
// $clock->clickH();
// var_dump($clock->isAlarmTime());
// $clock->clickMode();
$clock->longClickMode();
// echo $clock->getCurrentMode(), "\n";
for ($i = 1; $i <= 18 * 60; $i++) {
    $clock->tick();
}
// print_r("{$clock->getHours()} : {$clock->getMinutes()}\n{$clock->getAlarmHours()} : {$clock->getAlarmMinutes()}\n");
// print_r($clock);
// echo $clock->getCurrentMode(), "\n";
$clock->tick();
// echo $clock->getCurrentMode(), "\n";
print_r("{$clock->getHours()} : {$clock->getMinutes()}\n{$clock->getAlarmHours()} : {$clock->getAlarmMinutes()}\n");