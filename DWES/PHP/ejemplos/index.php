<?php
require_once __DIR__ . '/vendor/autoload.php';

use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;// crea el objeto
$generator = new ComputerPasswordGenerator();
// opciones para generar la contraseña
$generator
    ->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, true)
    ->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, true)
    ->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, true)
    ->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, true)
    ->setLength(8);

$password = $generator->generatePassword();

echo $password;