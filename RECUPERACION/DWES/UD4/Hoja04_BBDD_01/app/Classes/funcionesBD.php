<?php
namespace App\Classes;

use PDO;
use PDOException;
use Exception;

class funcionesBD
{
    public static function getEquipos()
    {
        $conexion = ConnectionPDODotenv::getConnection();
        $equipos = [];

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

    public static function getJugadoresPorEquipo($equipo)
    {
        $conexion = ConnectionPDODotenv::getConnection();
        $jugadores = [];
        $pesos = [];

        try {
            $stmt = $conexion->prepare('SELECT nombre, peso FROM jugadores WHERE nombre_equipo = :nombre_equipo');
            $stmt->bindParam(':nombre_equipo', $equipo);
            $stmt->execute();

            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $jugadores[] = $fila['nombre'];
                $pesos[] = $fila['peso'];
            }
        } catch (PDOException $e) {
            echo 'Error al consultar los jugadores: ' . $e->getMessage();
        }

        return ['jugadores' => $jugadores, 'pesos' => $pesos];
    }

    public static function actualizarJugador($jugador, $nuevoNombre, $nuevaProcedencia, $nuevaAltura, $nuevoPeso, $nuevaPosicion)
{
    $conexion = ConnectionPDODotenv::getConnection();

    try {
        $stmt = $conexion->prepare('UPDATE jugadores SET nombre = :nuevoNombre, procedencia = :nuevaProcedencia, altura = :nuevaAltura, peso = :nuevaPeso, posicion = :nuevaPosicion WHERE nombre = :jugador');
        $stmt->bindParam(':jugador', $jugador);
        $stmt->bindParam(':nuevoNombre', $nuevoNombre);
        $stmt->bindParam(':nuevaProcedencia', $nuevaProcedencia);
        $stmt->bindParam(':nuevaAltura', $nuevaAltura);
        $stmt->bindParam(':nuevaPeso', $nuevoPeso);
        $stmt->bindParam(':nuevaPosicion', $nuevaPosicion);
        $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception('Error al actualizar el jugador: ' . $e->getMessage());
    }
}

}
