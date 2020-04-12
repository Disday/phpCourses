<?php
class PasswordValidator
{
  public $minLength = 8;
  public $requireNumbers = false;
  public function __construct($options = [])
  {
    $this->minLength = $options['minLength'] ?? $this->minLength;
    $this->requireNumbers = $options['containNumbers'] ?? $this->requireNumbers;
    return $this;
  }
  public function validate($password)
  {
    $errors = [];
    if (strlen($password) < $this->minLength) {
      $errors['minLength'] = 'too small';
    }
    if ($this->requireNumbers === true && !self::hasNumber($password)) {
      $errors['containNumbers'] = 'should contain at least one number';
    }
    return $errors;
  }
  private function hasNumber($subject)
  {
    return strpbrk($subject, '1234567890') !== false;
  }
}

$validator = new PasswordValidator(['minLength' => 15]);
var_dump($validator);
print_r($validator->validate('qweasdsdqdqwdqdqwdqwd'));
