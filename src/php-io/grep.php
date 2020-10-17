<?php

function grep($string, $pattern)
{
    $dir = new GlobIterator($pattern);
    $matchList = [];    
    foreach ($dir as $fileName) {
        if (is_file($fileName)) {
            $file = new SplFileObject($fileName);
            while (!$file->eof()) {
                $line = $file->fgets();
                if (preg_match("/{$string}/", $line)) {
                    $matchList[] = $line;
                }
            }
        }
    }
    return $matchList;
}

print_r(grep('asdqweasdqwe', 'e:/hexlet/php-Courses/src/php-io/*'));
