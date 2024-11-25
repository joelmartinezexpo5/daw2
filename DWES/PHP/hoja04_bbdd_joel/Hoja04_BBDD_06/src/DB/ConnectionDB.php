<?php

namespace Product\DB;

use Dotenv\Dotenv;
use PDO;
use PDOException;

final class ConnectionDB
{
    private static ?PDO $connection = null;

    private function __construct() {}
    private function __clone() {}

    private static function loadEnv(): void
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();
    }

    private static function getDSN(): string
    {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db_name = $_ENV['DB_NAME'];
        return "mysql:host={$host};port={$port};dbname={$db_name}";
    }

    private static function getUsername(): string
    {
        return $_ENV['DB_USERNAME'];
    }

    private static function getPassword(): string
    {
        return $_ENV['DB_PASSWORD'];
    }

    private static function handleConnectionError(PDOException $exception): void
    {
        $code = $exception->getCode();
        $message = match ($code) {
            1049 => 'Database not found',
            1045 => 'Access denied',
            2002 => 'Connection refused',
            default => 'Unknown database error',
        };

        throw new PDOException("Database connection failed: {$message}", $code);
    }

    public static function getConnection(): ?PDO
    {
        if (!self::$connection) {
            self::loadEnv();

            $dsn = self::getDSN();
            $username = self::getUsername();
            $password = self::getPassword();

            try {
                self::$connection = new PDO($dsn, $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            } catch (PDOException $pdo_e) {
                self::handleConnectionError($pdo_e);
            }
        }
        return self::$connection;
    }
}
