<?php

namespace Poly;

// BEGIN (write your solution here)
class FakeSubscription
{
  private $hasAccess;

  public function __construct($user)
  {
    $user->isAdmin() ? $this->hasAccess = true : $this->hasAccess = false;
  }

  public function hasProfessionalAccess()
  {
    return $this->hasAccess;
  }

  public function hasPremiumAccess()
  {
    return $this->hasAccess;
  }
}

// END
