<?php

namespace App\parsers;

use Symfony\Component\Yaml\Yaml;

class YamlParser
{
    public static function parse(string $yaml): array
    {
        return Yaml::parse($yaml);
    }
}

