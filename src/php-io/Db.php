<?php
require_once 'Db/NotFoundException.php';

class Db
{
    private const KEY_LENGTH = 8;
    private const VALUE_LENGTH = 100;

    function __construct($filePath)
    {
        if (!file_exists($filePath)) {
            touch($filePath);
        }
        $this->store = $filePath;
    }

    function parse($key)
    {
        $store = new SplFileObject($this->store, 'r');
        while ($store->ftell() <= $store->fstat()['size']) {
            $currentKey = trim($store->fread(self::KEY_LENGTH));
            if ($currentKey === $key) {
                $position = $store->ftell();
                $value = trim($store->fread(self::VALUE_LENGTH));
                return compact('value', 'position');
            }
            $store->fseek(self::VALUE_LENGTH, SEEK_CUR);
        }
        return null;
    }

    function get($key)
    {
        $found = $this->parse($key);
        if (!$found) {
            throw new NotFoundException();
        }
        return $found['value'];
    }

    function set($key, $value)
    {
        $store = new SplFileObject($this->store, 'r+');
        $found = $this->parse($key);
        if ($found) {
            $pointer = $found['position'];
            $store->fseek($pointer);
        } else {
            $store->fseek(0, SEEK_END);
            $start = $store->ftell();
            $store->fwrite($key);
            $store->fseek($start + self::KEY_LENGTH);
        }
        $filler = str_repeat("\0", self::VALUE_LENGTH - strlen($value));
        $store->fwrite($value . $filler);
    }
}

$db = new Db(__DIR__ . DIRECTORY_SEPARATOR . 'newstore');
$db->set('name', 'dima');
$db->set('surname', 'tem');
$db->set('age', '35');
echo $db->get('name'), PHP_EOL;
// echo $db->get('age'), PHP_EOL;
// $db->set('name', 'katya');
// echo $db->get('name'), PHP_EOL;
// echo $db->get('age'), PHP_EOL;
