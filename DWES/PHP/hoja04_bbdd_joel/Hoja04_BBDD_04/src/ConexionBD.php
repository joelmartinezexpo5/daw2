<?php

namespace App;

use PDO;
use PDOException;
use Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

// Cargar variables de entorno desde el archivo .env
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
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
                    $_ENV['DB_DSN'],
                    $_ENV['DB_USERNAME'],
                    $_ENV['DB_PASSWORD'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            }
        } catch (PDOException $e) {
            echo match ($e->getCode()) {
                1049 => 'Base de datos no encontrada',
                1045 => 'Acceso denegado',
                2002 => 'Conexión rechazada',
                default => 'Error desconocido: ' . $e->getMessage(),
            };
            return null;
        }

        return self::$connection;
    }

    private function __clone() {}
}
