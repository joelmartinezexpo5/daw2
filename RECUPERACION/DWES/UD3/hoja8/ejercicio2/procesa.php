<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Datos recibidos por POST:</h2>";
    if (!empty($_POST["nombre"]) && !empty($_POST["modulo"])) {
        echo "Nombre del Alumno: " . $_POST["nombre"] . "<br>";
        echo "Módulo seleccionado: " . $_POST["modulo"];
    } else {
        echo "No se recibieron todos los datos con POST.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "<h2>Datos recibidos por GET:</h2>";
    if (!empty($_GET["nombre"]) && !empty($_GET["modulo"])) {
        echo "Nombre del Alumno: " . $_GET["nombre"] . "<br>";
        echo "Módulo seleccionado: " . $_GET["modulo"];
    } else {
        echo "No se recibieron todos los datos con GET.";
    }
} else {
    echo "Método no soportado.";
}
?>
