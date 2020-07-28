<?php

namespace Poly\TicTacToe;

require __DIR__ . '/../../../vendor/autoload.php';

use Poly\TicTacToe\Strategies\Easy;
use Poly\TicTacToe\Strategies\Normal;

interface getTurnCoordinates
{
    public function getTurnCoordinates($state);
}

class TicTacToe
{
    private $strategy;
    private $state;
    public function __construct($strategy = 'easy')
    {
        $strategies = [
            'easy' => new Easy(),
            'normal' => new Normal()
        ];
        $this->strategy = $strategies[$strategy];
        for ($i = 1; $i <= 3; $i++) { // fill matrix from 1 to 3
            $this->state[$i][1] = null;
            $this->state[$i][2] = null;
            $this->state[$i][3] = null;
        }
    }
    public function go($line = null, $column = null)
    {
        $currentTurn = 'player';
        if (!$line) {
            $coordinates = $this->strategy->getTurnCoordinates($this->state);
            [$line, $column] = $coordinates;
            $currentTurn = 'AI';
        }
        $this->state[$line][$column] = $currentTurn; //make turn
        return $this->checkIfWinner();
    }
    private function checkIfWinner()
    {
        $state = $this->state;
        $result = false;
        for ($i = 1; $i <= 3; $i++) {
            if ($state[$i][1] != null) {
                $result = $state[$i][1] === $state[$i][2] && $state[$i][2] === $state[$i][3];
            }
            if ($result === true) return $result;
            if ($state[1][$i] != null) {
                $result = $state[1][$i] === $state[2][$i] && $state[2][$i] === $state[3][$i];
            }
            if ($result === true) return $result;
        }
        if ($state[2][2] != null) {
            $diag1 = $state[1][1] === $state[2][2] && $state[2][2] === $state[3][3];
            $diag2 = $state[1][3] === $state[2][2] && $state[2][2] === $state[3][1];
            // echo $diag1, $diag2;
            if ($diag1 || $diag2) return true;
        }

        return false;
    }
    public function show()
    {
        $map = [
            'player' => 'P',
            'AI' => 'A',
            null => 'x'
        ];
        foreach ($this->state as $line) {
            echo $map[$line[1]], '-';
            echo $map[$line[2]], '-';
            echo $map[$line[3]], "\n";
        }
    }
}

$game = new TicTacToe('normal');
var_dump($game->go(1, 3));
var_dump($game->go());
var_dump($game->go(2, 3));
var_dump($game->go());
var_dump($game->go(3, 3));
print_r($game->show());
// print_r($game);
// var_dump($game->go(2, 1));
// var_dump($game->go());
// var_dump($game->go(2, 3));
// var_dump($game->go());
