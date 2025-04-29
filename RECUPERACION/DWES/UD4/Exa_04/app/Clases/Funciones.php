<?php

namespace Producto\Clases;

use PDO;
use PDOException;

class Funciones
{

    public static function getFamilias(): array
    {
        $familias = [];
        try {

            $conexion = ConexionBD::getConexion();

            $query = "SELECT codigo,nombre from familias";
            $stmt = $conexion->query($query);

            while ($fila = $stmt->fetch(PDO::FETCH_OBJ)) {
                $familia = new Familia($fila->codigo, $fila->nombre);
                $familias[$familia->getCodigo()] = $familia;
            }
        } catch (PDOException $pdo_e) {
            echo "Funciones::getFamilias() " . $pdo_e->getMessage();
        }
        return $familias;
    }

    public static function crearImagen(Imagen $imagen): int
    {
        $resultado = 0;
        try {
            $conexion = ConexionBD::getConexion();

            $query = "INSERT INTO imagenes(nombre,url) 
            VALUES(:nombre,:url)";

            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':nombre', $imagen->getNombre());
            $stmt->bindParam(':url', $imagen->getURL());


            if ($stmt->execute()) {
                $resultado = $conexion->lastInsertId();
            }
        } catch (PDOException $pdo_e) {
            echo "Funciones::crearImagen() " . $pdo_e->getMessage();
        }
        return $resultado;
    }

    public static function eliminarImagen(int $imagen_id): bool
    {
        $resultado = false;

        try {
            $conexion = ConexionBD::getConexion();

            $query = "DELETE FROM imagenes WHERE id =:imagen_id";

            $stmt = $conexion->prepare($query);

            $stmt->bindParam(':imagen_id', $imagen_id);
            if ($stmt->execute()) {
                $resultado = $stmt->rowCount() === 1;
            }
        } catch (PDOException $pdo_e) {
            echo "Funciones::deleteImagen() " . $pdo_e->getMessage();
        }
        return $resultado;
    }
}
