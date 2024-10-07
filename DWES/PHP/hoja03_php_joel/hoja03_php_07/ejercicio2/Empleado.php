<?php
require_once 'InformacionPersonal.php';
require_once 'InformacionLaboral.php';
require_once 'Mensaje.php';

class Empleado {
    use InformacionPersonal, InformacionLaboral, Mensaje;
}

$empleado = new Empleado();
$empleado->actualizarInformacionPersonal("Juan Pérez", 35, "Calle Falsa 123");
$empleado->actualizarInformacionLaboral("E123", 50000);
$empleado->mostrarMensaje("Información del Empleado:");
$empleado->mostrarInformacionPersonal();
$empleado->mostrarInformacionLaboral();
?>
