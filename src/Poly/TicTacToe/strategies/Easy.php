<?php

namespace Poly\TicTacToe\Strategies;

use Poly\TicTacToe\getTurnCoordinates;

class Easy implements getTurnCoordinates
{
    public function getTurnCoordinates($state)
    {
        for ($line = 1; $line <= 3; $line++) {
            for ($column = 1; $column <= 3; $column++) {
                if ($state[$line][$column] === null) {
                    return [$line, $column];
                }
            }
        }
    }
}
