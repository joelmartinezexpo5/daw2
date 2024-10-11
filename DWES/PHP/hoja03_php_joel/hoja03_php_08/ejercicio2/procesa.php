<?php
// Mostrar datos enviados por POST
if (!empty($_POST)) {
    echo "Nombre: " . $_POST['nombre'] . "<br>";
    echo "Módulo: " . $_POST['modulo'] . "<br>";
}

// Mostrar datos enviados por GET
if (!empty($_GET)) {
    echo "Nombre: " . $_GET['nombre'] . "<br>";
    echo "Módulo: " . $_GET['modulo'] . "<br>";
}
?>

