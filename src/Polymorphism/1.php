<?php
function flatten_and_sort($array) {
    return array_merge(...$array);
}
    print_r(flatten_and_sort([[1, 3, 5], [100], [2, 4, 6]]));
    // flatten_and_sort([[1, 3, 5], [100], [2, 4, 6]]);