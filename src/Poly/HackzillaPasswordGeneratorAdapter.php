<?php

namespace App;

require __DIR__ . '/../../vendor/autoload.php';

use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

use function Funct\Strings\toUpper;

class HackzillaPasswordGeneratorAdapter implements PasswordGeneratorInterface
{
    // BEGIN (write your solution here)

    public function generatePassword($length, $params)
    {
        $optionsMap = ['upperCase', 'symbols', 'numbers'];
        $generator = new ComputerPasswordGenerator();
        foreach ($optionsMap as $option) {
            $flag = in_array($option, $params);
            $generator->setOptionValue(strtoupper($option), $flag);
        }
        $generator->setLength($length);
        return $generator->generatePassword();
    }
    // END
}

$builder = new PasswordBuilder(new HackzillaPasswordGeneratorAdapter());
$passwordInfo = $builder->buildPassword(10, []);
print_r($passwordInfo);