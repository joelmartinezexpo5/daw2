<?php

namespace App\DB;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class ConexionBD
{
    private static $conexion = null;

    public static function getConexion()
    {
        if (self::$conexion === null) {

            $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
            $dotenv->load();

            $dsn = $_ENV['DB_DSN'] ?? '';
            $username = $_ENV['DB_USERNAME'] ?? '';
            $password = $_ENV['DB_PASSWORD'] ?? '';

            try {
                self::$conexion = new PDO($dsn, $username, $password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo match ($e->getCode()) {
                    1049 => 'Base de datos no encontrada',
                    1045 => 'Acceso denegado',
                    2002 => 'Conexion rechazada',
                    default => 'Error desconocido',
                };
            }
        }
        return self::$conexion;
    }
}
