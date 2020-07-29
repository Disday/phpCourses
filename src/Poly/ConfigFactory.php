<?php
namespace App;
require __DIR__ . '/../../vendor/autoload.php';

use App\Config;

class ConfigFactory
{
    public static function build($file)
    {
        $rawData = file_get_contents($file);
        $parsersMap = [
            'json' => 'JsonParser',
            'yaml' => 'YamlParser',
            'yml' => 'YamlParser'
        ];
        $fileType = pathinfo($file, PATHINFO_EXTENSION);
        $parserClass = 'App\parsers\\' . $parsersMap[$fileType];
        $configData = $parserClass::parse($rawData);
        return new Config($configData);
    }
}


$config = ConfigFactory::build(__DIR__ . '/fixtures/test.yml');
echo $config->key, "\n"; // value
print_r(get_class($config)); // Config
var_dump($config);