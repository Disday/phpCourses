<?php

namespace Poly;

class InMemoryKV implements KeyValueStorageInterface
{
  private $storage;

  public function __construct($default = [])
  {
    $this->storage = $default;
  }

  public function get($key, $default = null)
  {
    return $this->storage[$key] ?? $default;
  }

  public function set($key, $value)
  {
    $this->storage[$key] = $value;
  }

  public function unset($key)
  {
    unset($this->storage[$key]);
  }

  public function toArray()
  {
    return $this->storage;
  }

  public function serialize()
  {
    return json_encode($this->storage);
  }

  public function unserialize($serialized)
  {
    $this->storage = json_decode($serialized);
  }
}

// $map = new InMemoryKV(['key' => 10]);
// var_dump($map->get('key', 'default'));
// $base->unset('qwe');
// var_dump($base->toArray());
