<?php
namespace MiAplicacion\Interfaces;

interface InterfazGeneradorPassword{
    public function generar($longitud, $mayusculas, $minusculas, $numeros, $simbolos);
}