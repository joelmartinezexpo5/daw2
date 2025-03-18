<?php
require_once 'Empleado.php';
require_once 'Encargado.php';

$empleado1 = new Empleado("Juan", 2000);
$encargado1 = new Encargado("María", 2000);

echo $empleado1->getNombre() . " tiene un sueldo de " . $empleado1->getSueldo() . "€<br>";
echo $encargado1->getNombre() . " tiene un sueldo de " . $encargado1->getSueldo() . "€<br>";