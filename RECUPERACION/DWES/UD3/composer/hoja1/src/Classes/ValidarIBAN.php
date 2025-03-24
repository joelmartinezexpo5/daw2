<?php

namespace Hoja1\Classes;

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
        // Reorganizamos el IBAN: "ES00" seguido de los 20 dígitos del CCC
        $ibanReordenado = substr($this->iban, 4) . '1428'; // "ES" = 14 y "S" = 28
        // Convertimos el IBAN en un número, sustituyendo las letras por sus valores numéricos
        $ibanNumerico = '';
    
        foreach (str_split($ibanReordenado) as $char) {
            if (is_numeric($char)) {
                $ibanNumerico .= $char; // Si es un número, lo agregamos tal cual
            } else {
                // Si es una letra, la convertimos a su valor numérico: 'E' = 14, 'S' = 28
                $ibanNumerico .= (ord($char) - 55); // 'A' = 65 -> 65 - 55 = 10, 'E' = 14, 'S' = 28, etc.
            }
        }
    
        // Usamos BigInteger para manejar el número grande
        $bigInteger = BigInteger::of($ibanNumerico);
        
        // Calculamos el módulo 97
        $resto = $bigInteger->mod(97)->toInt();
    
        // Si el resto es 1, el IBAN es válido
        return $resto === 1;
    }
    
}
