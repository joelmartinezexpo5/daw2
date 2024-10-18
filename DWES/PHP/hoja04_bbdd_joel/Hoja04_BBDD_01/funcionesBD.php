<?php
include_once 'ConexionBD.php';

function getEquipos() {
    $conexion = ConnectionPDODotenv::getConnection();
    $equipos = array();

    try {
        $consulta = $conexion->query('SELECT nombre FROM equipos');
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $equipos[] = $fila['nombre'];
        }
    } catch (PDOException $e) {
        echo 'Error al consultar los equipos: ' . $e->getMessage();
    }

    return $equipos;
}

function getJugadoresPorEquipo($equipo) {
    $conexion = ConnectionPDODotenv::getConnection();
    $jugadores = array();

    try {
        $stmt = $conexion->prepare('SELECT nombre FROM jugadores WHERE nombre_equipo = :nombre_equipo');
        $stmt->bindParam(':nombre_equipo', $equipo);
        $stmt->execute();

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $jugadores[] = $fila['nombre'];
        }
    } catch (PDOException $e) {
        echo 'Error al consultar los jugadores: ' . $e->getMessage();
    }

    return $jugadores;
}
?>
