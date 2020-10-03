<?php

namespace App\Poly\TcpConnection\states;

require __DIR__ . '/../../../../vendor/autoload.php';


class Disconnected
{
    public function getName()
    {
        return $this->name = strtolower((new \ReflectionClass($this))->getShortName());
    }
    public function connect($connection)
    {
        $connection->state = new Connected();
    }
    public function disconnect()
    {
        throw new \Exception('Already disconnected');
    }
    public function write($data)
    {
        throw new \Exception('Cant write. Disconnected');
    }
}
