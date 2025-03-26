<?php
namespace MiAplicacion\Classes;

use MiAplicacion\Interfaces\InterfazGeneradorPassword;

class AdaptadorGeneradorPassword implements InterfazGeneradorPassword {
    public function generar($longitud, $mayusculas, $minusculas, $numeros, $simbolos) {
        return GeneradorPassword::generar($longitud, $mayusculas, $minusculas, $numeros, $simbolos);
    }
}