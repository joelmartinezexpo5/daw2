<?php
include 'Monedero.php';

$monedero1 = new Monedero(200);

echo $monedero1;

$monedero1->meterDinero(100);

echo $monedero1;

$monedero1->sacarDinero(301);

echo $monedero1;