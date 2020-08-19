<?php
namespace App;11
class Time
{
    private $h;
    private $m;

    // BEGIN (write your solution here)
    public static function fromString(string $str){
			$hours = explode(':', $str)[0];
			$minutes = explode(':', $str)[1];
			return new self($hours, $minutes);
    }
    // END

    public function __construct($h, $m)
    {
        $this->h = $h;
        $this->m = $m;
    }

    public function __toString()
    {
        return "{$this->h}:{$this->m}";
    }
}

echo Time::fromString('10:12');