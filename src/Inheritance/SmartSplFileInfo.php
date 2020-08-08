<?php

namespace App\Inheritance;

// use SplFileInfo;

class SmartSplFileInfo extends \SplFileInfo
{
    public function getSize(string $unit = 'b')
    {
        $map = [
            'b' => 1,
            'kb' => 1024
        ];
        $factor = $map[$unit] ?? null;
        if (!$factor) {
            throw new \Exception('Uncompatible file size unit');
        }
        return parent::getSize() / $factor;
    }
}

$file = new SmartSplFileInfo(__DIR__ . '/HTMLElement.php');
echo $file->getSize('mb');
