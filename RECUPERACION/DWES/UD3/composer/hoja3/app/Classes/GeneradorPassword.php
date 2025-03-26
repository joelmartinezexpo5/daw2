<?php
namespace MiAplicacion\Classes;

use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class GeneradorPassword {
    public static function generar($longitud, $mayusculas, $minusculas, $numeros, $simbolos) {
        // Asegurarse de que $longitud sea un número entero
        $longitud = (int) $longitud; // Convierte a entero

        // Verificar que la longitud sea positiva
        if ($longitud <= 0) {
            throw new \InvalidArgumentException("La longitud de la contraseña debe ser un número entero positivo.");
        }

        $generator = new ComputerPasswordGenerator();
        $generator->setLength($longitud);

        $generator->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, $mayusculas);
        $generator->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, $minusculas);
        $generator->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, $numeros);
        $generator->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, $simbolos);

        return $generator->generatePassword();
    }
}
