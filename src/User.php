<?php

namespace App;
require_once 'Comparable.php';

class User implements Comparable
{
    public $name;
    public $id;
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    public function getId()
    {
        return $this->id;
    }
    public function compareTo($user)
    {
        return $this->getId() === $user->getID();
    }
}

$user1 = new User(4, 'tolya');
$user2 = new User(2, 'petya');
// print_r($user1->getId());
var_dump($user1->compareTo($user2));