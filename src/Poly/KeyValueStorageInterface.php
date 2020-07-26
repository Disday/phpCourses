<?php

namespace Poly;

// BEGIN (write your solution here)
interface KeyValueStorageInterface extends \Serializable
{
  public function get($key, $default = null);
  public function set($key, $value);
  public function unset($key);
  public function toArray();
}
// END
