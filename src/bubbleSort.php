<?php
function bubbleSort($arr)
{
    if (empty($arr)) return $arr;
    $last = count($arr) - 1;
    for ($count = $last; $count >= 0; $count--) {
        for ($n = $last; $n > 0; $n--) {
            if ($arr[$n] < $arr[$n - 1]) {
                $temp = $arr[$n - 1];
                $arr[$n - 1] = $arr[$n];
                $arr[$n] = $temp;
                //     print_r($arr);
                //     print_r($n);
            }
        }
        print_r($count);
    }
    return $arr;
}

// bubbleSort([3, 10, 4, 3]); // [3, 3, 4, 10]
print_r(bubbleSort([10, 1, 3]));
// var_dump(bubbleSort([]));