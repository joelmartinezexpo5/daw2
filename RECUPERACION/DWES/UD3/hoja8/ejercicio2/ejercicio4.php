<?php
echo "<h2>Datos recibidos con \$_REQUEST:</h2>";

if (!empty($_REQUEST["nombre"]) && !empty($_REQUEST["modulo"])) {
    echo "Nombre del Alumno: " . $_REQUEST["nombre"] . "<br>";
    echo "Módulo seleccionado: " . $_REQUEST["modulo"];
} else {
    echo "No se recibieron todos los datos correctamente.";
}
?>
