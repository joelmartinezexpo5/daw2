<?php
namespace App;

use PDO;

class FuncionesBD {

    // Obtener todos los equipos de la base de datos
    public static function getEquipos() {
        $conexion = ConexionBD::getConnection();
        $equipos = [];

        $resultado = $conexion->query('SELECT nombre FROM equipos');
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $equipos[] = $registro['nombre'];
        }

        return $equipos;
    }

    // Obtener jugadores y sus pesos de un equipo específico
    public static function getJugadoresPorEquipo($equipo) {
        $conexion = ConexionBD::getConnection();
        $jugadores = [];

        $resultado = $conexion->prepare('SELECT codigo, nombre, peso FROM jugadores WHERE nombre_equipo = :nombre_equipo');
        $resultado->bindParam(':nombre_equipo', $equipo);
        $resultado->execute();

        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $jugadores[] = [
                'codigo' => $registro['codigo'],
                'nombre' => $registro['nombre'],
                'peso' => $registro['peso']
            ];
        }

        return $jugadores;
    }

    // Actualizar los datos de un jugador (traspaso)
    public static function traspasarJugador($codigo, $nuevoNombre, $procedencia, $altura, $peso, $posicion) {
        $conexion = ConexionBD::getConnection();

        $resultado = $conexion->prepare('UPDATE jugadores SET nombre = :nuevoNombre, procedencia = :procedencia, altura = :altura, peso = :peso, posicion = :posicion WHERE codigo = :codigo');
        $resultado->bindParam(':nuevoNombre', $nuevoNombre);
        $resultado->bindParam(':procedencia', $procedencia);
        $resultado->bindParam(':altura', $altura);
        $resultado->bindParam(':peso', $peso);
        $resultado->bindParam(':posicion', $posicion);
        $resultado->bindParam(':codigo', $codigo);

        $resultado->execute();
    }
}
