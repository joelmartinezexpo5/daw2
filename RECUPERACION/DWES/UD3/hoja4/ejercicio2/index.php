<?php
include 'Coche.php';
$coche1 = new Coche("1234ABC", 50);

echo $coche1->__toString();
echo "<br>";

$coche1->acelera(20);
echo $coche1->__toString();

echo "<br>";
$coche1->frena(10);
echo $coche1->__toString();