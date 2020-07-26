<?php
namespace Poly;
require __DIR__ . '/../../vendor/autoload.php';

$db = new InMemoryKV(['qwe' => 123]);
$db->set('asd', 'rtbgrb');
print_r($db->toArray());