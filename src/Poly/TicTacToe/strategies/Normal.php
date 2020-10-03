<?php

namespace Poly\TicTacToe\Strategies;

use Poly\TicTacToe\getTurnCoordinates;

class Normal implements getTurnCoordinates
{
    public function getTurnCoordinates($state)
    {
        for ($line = 3; $line >= 1; $line--) {
            for ($column = 1; $column <= 3; $column++) {
                if ($state[$line][$column] === null) {
                    return [$line, $column];
                }
            }
        }
    }
}
