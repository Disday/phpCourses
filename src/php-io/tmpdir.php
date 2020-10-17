<?php

function rrmdir($dir)
{
    $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS), \RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($iterator as $filename => $fileInfo) {
        if ($fileInfo->isDir()) {
            rmdir($filename);
        } else {
            unlink($filename);
        }
    }
    rmdir($dir);
}

function tmpdir($callback)
{
    $tempDirPath = __DIR__ . DIRECTORY_SEPARATOR . 'temp';
    if (!file_exists($tempDirPath)) {
        mkdir($tempDirPath);
    }
    try {
        return $callback($tempDirPath);
    } finally {
        rrmdir($tempDirPath);
        // return $result;
    }
}

$callback = function ($dir) {
    is_dir($dir); // true
    return tempsnam($dir, 'hexlet');
};
var_dump(tmpdir($callback));
