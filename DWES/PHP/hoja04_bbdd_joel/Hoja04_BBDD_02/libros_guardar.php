<?php
require_once 'funcionesBD.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $anyo_edicion = $_POST['anyo_edicion'];
    $precio = $_POST['precio'];
    $fecha_adquisicion = $_POST['fecha_adquisicion'];

    if (!empty($titulo) && !empty($anyo_edicion) && !empty($precio) && !empty($fecha_adquisicion)) {
        $guardado = guardarLibro($titulo, $anyo_edicion, $precio, $fecha_adquisicion);
        if ($guardado) {
            echo "Datos guardados correctamente";
        } else {
            echo "Error al guardar los datos";
        }
    } else {
        echo "Por favor, completa todos los campos correctamente.";
    }
}
?>
<br><a href="libros.php">Volver</a>
