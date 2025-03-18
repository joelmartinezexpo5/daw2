<?php
include 'Circulo.php';

$circulo1 = new Circulo(2);

echo $circulo1->getRadio();

echo '<br>';
$circulo1->setRadio(4);

echo $circulo1->getRadio();
