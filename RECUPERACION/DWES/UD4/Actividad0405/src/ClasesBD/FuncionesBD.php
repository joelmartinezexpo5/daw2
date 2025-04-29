<?php
namespace Ejercicio0405\ClasesBD;
use Ejercicio0405\Interfaces\Metodos;
use Ejercicio0405\Clases\Producto;
use Ejercicio0405\ClasesBD\ConexionBD;
use PDO;
use PDOException;
class FuncionesBD
{
    //esta es la clase con las funciones que no sean de productos de la base de datos

    //funcion para obtener todas las familias
    function getFamilias()
    {
        try {
            $stmt = ConexionBD::getConnection();

            $resultado = $stmt->query('SELECT idfamilias,nombre FROM familias');
            $familias = $resultado->fetchAll(PDO::FETCH_OBJ);
            var_dump($familias);
            return $familias;
        } catch (PDOException $e) {
            echo "Error al obtener las familias: " . $e->getMessage();
            return [];
        }
    }

    //funcion para crear imagenes
    function crearImagen($idProducto, $nombre): bool
    {
        try {
            $stmt = ConexionBD::getConnection();
            $consulta = $stmt->prepare('INSERT INTO imagenes(producto, nombre) VALUES (:producto, :nombre)');
            var_dump($idProducto, $nombre);
            $consulta->bindParam(':producto', $idProducto);
            $consulta->bindParam(':nombre', $nombre);

            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al guardar la imagen: " . $e->getMessage();
            return false;
        }
    }

    //funcion para verificar que exista un usuario 
    function verificarUsuario($usuario, $password): bool
    {
        try {
            $stmt = ConexionBD::getConnection();
            $consulta = $stmt->prepare('SELECT password FROM usuarios WHERE nombre = :usuario');
            $consulta->bindParam(':usuario', $usuario);
            $consulta->execute();

            $resultado = $consulta->fetch(PDO::FETCH_OBJ);


            if (!$resultado) {
                return false;
            }


            return password_verify($password, $resultado->password);
        } catch (PDOException $e) {
            echo "Error al verificar el usuario: " . $e->getMessage();
            return false;
        }
    }
    
    //funcion para registrar un usuario
    function registrarUsuario($usuario, $password): bool
    {
        try {
            $stmt = ConexionBD::getConnection();
            $consulta = $stmt->prepare('INSERT INTO usuarios (nombre, password) VALUES (:usuario, :password)');

            // Hashear el password antes de almacenarlo
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $consulta->bindParam(':usuario', $usuario);
            $consulta->bindParam(':password', $passwordHash);

            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al registrar el usuario: " . $e->getMessage();
            return false;
        }
    }

}
?>