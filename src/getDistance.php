<?php

function getDistance(array $point1, array $point2)
{
    [$x1, $y1] = $point1;
    [$x2, $y2] = $point2;

    $xs = $x2 - $x1;
    $ys = $y2 - $y1;

    return sqrt($xs ** 2 + $ys ** 2);
}

// BEGIN (write your solution here)
function getTheNearestLocation($locations, $point)
{
    $nearest = null;
    foreach ($locations as [$name, $position]) {
        $distance = getDistance($point, $position);
        if (!isset($minDistance) || $distance < $minDistance) {
            $minDistance = $distance;
            $nearest = [$name, $position];
        }
    }
    return $nearest;
}
// END
$locations = [
    ['Park', [10, 5]],
    ['Sea', [1, 3]],
    ['Museum', [8, 4]],
];

$currentPoint = [5, 5];

// Если точек нет, то возвращается null
// getTheNearestLocation([], $currentPoint); // null

// getTheNearestLocation($locations, $currentPoint); // ['Museum', [8, 4]]
var_dump(getTheNearestLocation([], $currentPoint)); // null
