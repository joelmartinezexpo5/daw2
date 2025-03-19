<?php
include_once 'Cuenta.php';
include_once 'CuentaCorriente.php';
include_once 'CuentaAhorro.php';

echo "<h2>Cuenta Corriente</h2>";
$cuenta1 = new CuentaCorriente("123456", "Juan Pérez", 500, 10);
$cuenta1->ingreso(100);
$cuenta1->reintegro(50);
$cuenta1->mostrar();

echo "<h2>Cuenta Ahorro</h2>";
$cuenta2 = new CuentaAhorro("789012", "María López", 1000, 20, 5);
$cuenta2->aplicaInteres();
$cuenta2->mostrar();
?>