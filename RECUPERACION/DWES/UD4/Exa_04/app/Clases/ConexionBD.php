<?php

namespace Producto\Clases;

use PDO;
use PDOException;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__,2));
$dotenv->load();

final class ConexionBD{

    private static ?PDO $conexion = null;

    private function __construct(){}
    private function __clone(){}


    public static function getConexion(): ?PDO{
        if(!self::$conexion){
            $dsn = $_ENV["DB_DSN"];
            $username = $_ENV["DB_USERNAME"];
            $password = $_ENV["DB_PASSWORD"];
            try{
                self::$conexion = new PDO($dsn,$username,$password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                self::$conexion->setAttribute(PDO::ATTR_STRINGIFY_FETCHES,false);
            }catch(PDOException $pdo_e){
                echo 'Conexion denegada ' . $pdo_e->getMessage();
            }
        }
        return self::$conexion;
    }

}


?>