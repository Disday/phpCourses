<?php

namespace Poly;

class User
{
    private $currentSubscription;
    private $email;

    public function __construct($email, $currentSubscription = null)
    {
        var_dump($this);
        $this->email = $email;
        // BEGIN (write your solution here)
        if ($currentSubscription === null) {
            $currentSubscription = new FakeSubscription($this);
        }
        // print_r($currentSubscription);
        $this->currentSubscription = $currentSubscription;
        // END
    }

    public function getCurrentSubscription()
    {
        return $this->currentSubscription;
    }

    public function isAdmin()
    {
        return $this->email === 'rakhim@hexlet.io';
    }
}
