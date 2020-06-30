<?php
function getIntersectionOfSortedArray($arr1, $arr2)
{
    $arr1Len = count($arr1) - 1;
    $arr2Len = count($arr2) - 1;
    $result = [];
    for ($i1 = 0, $i2 = 0; $i1 <= $arr1Len  && $i2 <= $arr2Len;) {
        $compare = $arr1[$i1] <=> $arr2[$i2];
        switch ($compare) {
            case 0:
                $result[] = $arr1[$i1];
                $i2 += 1;
                $i1 += 1;
                break;
            case -1:
                $i1 += 1;
                break;
            case 1:
                $i2 += 1;
                break;
        }
    }
    return $result;
}

getIntersectionOfSortedArray([10, 11, 24], [10, 13, 14, 18, 24, 30]); // [10, 24]

// getIntersectionOfSortedArray([10, 11, 24], [-2, 3, 4]); // []

// getIntersectionOfSortedArray([], [2]); // []