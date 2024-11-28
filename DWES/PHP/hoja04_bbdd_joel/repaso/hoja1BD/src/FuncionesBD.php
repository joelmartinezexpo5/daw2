<?php
namespace App;
use PDO;

class FuncionesBD{

    public static function getEquipos(){
        $conexion = ConexionBD::getConnection();
        $equipos = [];

        $resultado = $conexion->query('SELECT nombre FROM equipos');
        while ($registro = $resultado->fetch()){
            $equipos[] = $registro['nombre'];
        }
        return $equipos;
    }

    public static function getJugadoresPorEquipo($equipo){
        $conexion = ConexionBD::getConnection();
        $jugadores = [];

        $resultado = $conexion->prepare('SELECT codigo, nombre FROM jugadores WHERE nombre_equipo = :nombre_equipo');
        $resultado->bindParam(':nombre_equipo', $equipo);
        $resultado->execute();

        while($registro = $resultado->fetch()){
            $jugadores[] = $registro['nombre'];
        }

        return $jugadores;
    }

    public static function getPesos($equipo){
        $conexion = ConexionBD::getConnection();
        $pesos = [];

        $resultado = $conexion->prepare('SELECT peso FROM jugadores WHERE nombre_equipo= :nombre_equipo');
        $resultado->bindParam(':nombre_equipo', $equipo);
        $resultado->execute();
        
        while($registro = $resultado->fetch()){
            $pesos[] = $registro['peso'];
        }

        return $pesos;
    }
}
?>