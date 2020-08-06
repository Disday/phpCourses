<?php

namespace App\Poly\TcpConnection\states;

require __DIR__ . '/../../../../vendor/autoload.php';


class Connected
{
    public function getName()
    {
        return $this->name = strtolower((new \ReflectionClass($this))->getShortName());
    }
    public function connect($connection)
    {
        throw new \Exception('Already connected');
    }
    public function disconnect($connection)
    {
        $connection->state = new Disconnected();
    }
    public function write($data)
    {
        echo $data;
    }
}
