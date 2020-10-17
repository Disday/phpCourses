<?php

class Serializer
{
    static function dump($fileName, $data)
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . $fileName;
        $file = new SplFileObject($path, 'w');
        echo $file->fwrite(serialize($data));
    }
    
    static function load($fileName)
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . $fileName;
        return unserialize(file_get_contents($path));
    }
}

$data = [
    [''],
    [null],
    [3],
    [23.3],
    [[1, 3 => 'sdf.2', '' => null]]
];

// Serializer::dump('123123', $data);
print_r (Serializer::load('123123'));