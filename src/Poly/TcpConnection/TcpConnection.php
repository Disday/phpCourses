<?php

namespace App\Poly\TcpConnection;

// use Exception;

// use App\Poly\TcpConnection\states\Disconnected;

require __DIR__ . '/../../../vendor/autoload.php';


class TcpConnection implements TcpConnectionInterface
{
    private $ip;
    private $port;
    public $state;

    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->state = new states\Disconnected();
    }
    public function getCurrentState()
    {
        return $this->state->getName();
    }
    public function connect()
    {
        $this->state->connect($this);
    }
    public function disconnect()
    {
        $this->state->disconnect($this);
    }
    public function write($data)
    {
        $this->state->write($data);
    }
}

$connection = new TcpConnection('1.2.3.4', 2565);

// $connection->disconnect();
$connection->write(123);
print_r($connection->getCurrentState());

// $connection->connect();
// try {
// }
// catch (\Exception $e){
//     echo 'EEEXXXX', "\n", $e->getMessage();
// }
// print_r($connection);
