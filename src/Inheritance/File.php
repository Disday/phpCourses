<?php

namespace App\Inheritance;

require __DIR__ . '/../../vendor/autoload.php';
use App\Inheritance\Exceptions\NotExistsException;
use App\Inheritance\Exceptions\NotReadableException;
use App\Inheritance\Exceptions\FileException;

class File
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }
    public function read()
    {
        echo $this->filePath;
        switch (false) {
            case file_exists($this->filePath):
                throw new NotExistsException();
            case is_readable($this->filePath):
                throw new NotReadableException();
                break;
            default:
                return file_get_contents($this->filePath);
        }
    }
}

// $file = new File(__DIR__ . '\HTMLDivElements.php');
// echo $file->read();