<?php

namespace App\parsers;

// BEGIN (write your solution here)
class JsonParser
{
    public static function parse(string $json): array
    {
        return json_decode($json, true);
    }
}
// END
