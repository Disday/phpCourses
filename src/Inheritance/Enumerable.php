<?php

namespace App\Inheritance;

trait Enumerable
{
    abstract public function getIterator(): iterable;

    public function maxBy(callable $callback)
    {
        $collection = $this->getIterator();
        if (empty($collection)) {
            return null;
        }
        return array_reduce(
            $collection,
            fn ($carry, $item) => $callback($carry, $item) >= 0 ? $carry : $item,
            $collection[0]
        );
    }
}
