<?php

namespace Ejercicio03\clases;

use Ejercicio03\Interfaces\IUsuario;
use Ejercicio03\DB\ConexionBD;
use PDO;
use PDOException;
use Ejercicio03\Models\ModeloUsuario;

class PDOUsuario implements IUsuario
{

    public function registrar(ModeloUsuario $usuario): bool
    {
        $registrado = false;
        

        try {
            $conexion = ConexionBD::getConexion();

            $query = "INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)";

            $stmt = $conexion->prepare($query);
            $nombre_usuario = $usuario->getNombre();
            $contrasenia_usuario = password_hash($usuario->getContrasenia(), PASSWORD_BCRYPT);

            $stmt->bindParam(":usuario", $nombre_usuario, PDO::PARAM_STR);
            $stmt->bindParam(":password", $contrasenia_usuario);

            if ($stmt->execute()) {
                var_dump($stmt->rowCount());
                $registrado = true;
            }else {
                $registrado = false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $registrado;
    }


    /**
     ** ¿Que tiene resultado?
     ** -------------------------------------
     ** "usuario" => "nombre_de_usuario",
     ** "password" => "hash_de_la_contraseña"
     ** -------------------------------------
     ** si no hay coincidencias, resultado será false
     ** compara si la contraseña en texto plano es igual a la contrasña cifrada
     */
    public function loguearse(ModeloUsuario $usuario): bool
    {
        $logueo = false;

        try {
            $conexion = ConexionBD::getConexion();
            $nombre = $usuario->getNombre();

            $query = "SELECT usuario, password FROM usuarios WHERE usuario = :usuario";

            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':usuario',$nombre,PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            if ($resultado) {
                $logueo = password_verify($usuario->getContrasenia(), $resultado->password);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $logueo;
    }
}
