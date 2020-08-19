<?php

namespace MyNamespace;

class MyClass
{
}

$className = 'MyClass';
// $object = new $className(); //PHP Fatal error:  Uncaught Error: Class 'MyClass' not found

$className = MyClass::class;
var_dump($className);
$object = new $className(); 
print_r($object); // MyNamespace\MyClass Object