<?php
require_once 'conexionBD.php';

function guardarLibro($titulo, $anyo_edicion, $precio, $fecha_adquisicion) {
    $conexion = ConnectionPDODotenv::getConnection();
    if ($conexion) {
        $stmt = $conexion->prepare("INSERT INTO libros (titulo, anyo_edicion, precio, fecha_adquisicion) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$titulo, $anyo_edicion, $precio, $fecha_adquisicion]);
    }
    return false;
}

function obtenerLibros() {
    $conexion = ConnectionPDODotenv::getConnection();
    if ($conexion) {
        $stmt = $conexion->query("SELECT * FROM libros");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return [];
}
?>
