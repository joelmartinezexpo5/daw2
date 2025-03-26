<?php

namespace Hoja1\Classes;

use Brick\Math\BigInteger;

class ValidarIBAN {
    private string $iban;

    public function __construct(string $iban) {
        $this->iban = $iban;
    }

    public function validarLongitud(): bool {
        // Verificar que tenga exactamente 24 caracteres
        if (strlen($this->iban) !== 24) {
            return false;
        }
    
        // Verificar que empiece por "ES"
        if (substr($this->iban, 0, 2) !== "ES") {
            return false;
        }
    
        // Verificar que los 22 caracteres restantes sean dígitos
        $resto = substr($this->iban, 2);
        for ($i = 0; $i < strlen($resto); $i++) {
            if (!is_numeric($resto[$i])) {
                return false;
            }
        }
        return true;
    }

    public function validarDigitoControl(): bool {
        // Extraer los 20 dígitos del CCC
        $ccc = substr($this->iban, 4);

        // Mover "ESXX" al final y reemplazar ES por 1428
        $ibanNumerico = $ccc . '1428' . '00'; // Se usa 00 temporalmente para el cálculo

        // Convertir a BigInteger
        $bigInteger = BigInteger::of($ibanNumerico);

        // Calcular el módulo 97
        $resto = $bigInteger->mod(97)->toInt();

        $digitoCalculado = 98 - $resto;

        // Si el número es menor a 10, se agrega un "0" delante
        $digitoControlCalculado = ($digitoCalculado < 10) ? "0" . $digitoCalculado : (string)$digitoCalculado;
        
        $digitoControlOriginal = substr($this->iban, 2, 2);

        // echo $digitoControlOriginal. '<br>' .$digitoControlCalculado. '<br>';

        return $digitoControlCalculado === $digitoControlOriginal;
    }

    public function validarCCC(){
        $pesos = [1, 2, 4, 8, 5, 10, 9, 7, 3, 6];

        // Extraer partes del CCC
        $entidad = substr($this->iban, 4, 4);
        $oficina = substr($this->iban, 8, 4);
        $control = substr($this->iban, 12, 2);
        $cuenta = substr($this->iban, 14, 10);
    
    
        // Calcular primer digito de control
        $bloque1 = "00" . $entidad . $oficina;
        $suma1 = 0;
        for ($i = 0; $i < 10; $i++) {
            $suma1 += $bloque1[$i] * $pesos[$i];
        }
        $digito1 = 11 - ($suma1 % 11);
        if ($digito1 === 11) $digito1 = 0;
        if ($digito1 === 10) $digito1 = 1;

        // Cálculo del segundo dígito de control
        $suma2 = 0;
        for ($i = 0; $i < 10; $i++) {
            $suma2 += $cuenta[$i] * $pesos[$i];
        }
        $digito2 = 11 - ($suma2 % 11);
        if ($digito2 === 11) $digito2 = 0;
        if ($digito2 === 10) $digito2 = 1;

        // echo $digito1. $digito2 . '<br>' . $control;

        // Comparar con los dígitos originales
        return $control === "{$digito1}{$digito2}";
    }

    public function validarIBAN(): bool {
        return $this->validarLongitud() && $this->validarDigitoControl() && $this->validarCCC();
    }
}
