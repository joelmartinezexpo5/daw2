<?php

require '../vendor/autoload.php';
use Ejercicio2\Interfaces\Encendible;
use Ejercicio2\Classes\Coche;
use Ejercicio2\Classes\Bombilla;

$coche1 = new Coche();
$bombilla1 = new Bombilla(2);

function enciendeAlgo(Encendible $objeto){
    $objeto->encender();
}

enciendeAlgo($coche1);
echo '<br>';
enciendeAlgo($bombilla1);
echo '<br>';
$coche1->apagar();
echo '<br>';
$bombilla1->apagar();