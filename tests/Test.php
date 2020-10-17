<?php

require __DIR__ . '/../vendor/autoload.php';
require_once 'src/isEven.php';

use PHPUnit\Framework\TestCase;

// use function App\isEven;

class Test extends TestCase
{
    public function testIsEven()
    {
        $this->assertTrue(isEven(4));
        $this->assertFalse(isEven(5));
    }
}

// $test = (new Test())->test1();
