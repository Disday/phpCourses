<?php
class DatabaseConfigLoader
{
  function __construct($path)
  {
    $this->path = $path;
    return $this;
  }
  private function getConfig($env): array
  {
    $configFile = $this->path . "/database.{$env}.json";
    return json_decode(file_get_contents($configFile), true); //array
  }
  public function load($env)
  {
    $config = self::getConfig($env);
    $ext = [];
    if (isset($config['extend'])) {
      $extEnv = $config['extend'];
      unset($config['extend']);
      $ext = self::getConfig($extEnv);
    }
    return array_merge($ext, $config);
  }
}

$loader = new DatabaseConfigLoader(__DIR__ . '\fixtures');
var_dump($loader->load('development'));
