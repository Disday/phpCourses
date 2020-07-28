<?php

namespace App\LinkedList;

require __DIR__ . '/../../vendor/autoload.php';

use App\Node;

// BEGIN (write your solution here)
function reverse($list)
{
    $current = $list;
    $reversed = null;
    while (true) :
        if (!$current) {
            return $reversed;
        }
        $reversed = new Node($current->getValue(), $reversed);
        $current = $current->getNext();
    endwhile;
}
$numbers = new Node(144, new Node(55, new Node(6, new Node(77))));
print_r(reverse($numbers));
// $list = new Node(true);
// print_r(reverse($list));

// END
