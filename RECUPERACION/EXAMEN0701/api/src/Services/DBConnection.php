<?php

declare(strict_types = 1);

namespace Examen0701\Services;

use Examen0701\Services\DBConnection as ServicesDBConnection;
use PDO;
use PDOException;

final class DBConnection
{
    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ServicesDBConnection();
        }

        return self::$instance;
    }

    public function getConexion()
    {
        $opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

        try {
            $dwes = new PDO($_ENV['DB_DSN'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $opciones);
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $dwes;
        } catch(PDOException $e) {
            echo match ($e->getCode()) {
                1049    => 'Base de datos no encontrada',
                1045    => 'Acceso denegado',
                2002    => 'Conexión rechazada',
                default => 'Error desconocido',
            };
        }
    }
}

?>