<?php
namespace App;

use PDO;
use PDOException;
require_once __DIR__ . '../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

final class ConexionBD
{
    private static ?PDO $connection = null;

    final private function __construct() {}

    final public static function getConnection(): ?PDO
    {
        try {
            if (!self::$connection) {
                self::$connection = new PDO(
                    dsn: $_ENV['DB_DSN'],
                    username: $_ENV['DB_USERNAME'],
                    password: $_ENV['DB_PASSWORD'],
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            echo match ($e->getCode()) {
                1049 => 'Base de datos no encontrada',
                1045 => 'Acceso denegado',
                2002 => 'Conexión rechazada',
                default => 'Error desconocido',
            };
        }

        return self::$connection;
    }

    private function __clone() {}
}

$connection = ConexionBD::getConnection();

if ($connection instanceof PDO) {
    echo 'Conexión establecida correctamente';
}
