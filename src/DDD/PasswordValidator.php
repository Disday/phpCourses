<?php
class PasswordValidator
{
    // BEGIN (write your solution here)
    public function validate
    // END

    private function hasNumber($subject)
    {
        return strpbrk($subject, '1234567890') !== false;
    }
}
