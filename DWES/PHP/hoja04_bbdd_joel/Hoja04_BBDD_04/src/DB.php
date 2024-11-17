<?php

namespace App;

use PDO;

class DB
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = ConexionBD::getConnection();
    }

    // Obtener todos los productos (alimentación y electrónica)
    public function getProductos(): array
    {
        $query = "
            SELECT p.id, p.codigo, p.precio, p.nombre, c.nombre as categoria, a.mes_caducidad, a.anio_caducidad, e.plazo_garantia
            FROM productos p
            LEFT JOIN categorias c ON p.categoria_id = c.id
            LEFT JOIN alimentaciones a ON p.id = a.producto_id
            LEFT JOIN electronicas e ON p.id = e.producto_id
        ";

        $stmt = $this->connection->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener productos por categoría
    public function getProductosPorCategoria(int $categoriaId): array
    {
        $query = "
            SELECT p.id, p.codigo, p.precio, p.nombre, c.nombre as categoria, a.mes_caducidad, a.anio_caducidad, e.plazo_garantia
            FROM productos p
            LEFT JOIN categorias c ON p.categoria_id = c.id
            LEFT JOIN alimentaciones a ON p.id = a.producto_id
            LEFT JOIN electronicas e ON p.id = e.producto_id
            WHERE p.categoria_id = :categoria_id
        ";

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':categoria_id', $categoriaId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insertar un nuevo producto
    public function insertarProducto(array $productoData): int
    {
        $query = "
            INSERT INTO productos (codigo, precio, nombre, categoria_id)
            VALUES (:codigo, :precio, :nombre, :categoria_id)
        ";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            ':codigo' => $productoData['codigo'],
            ':precio' => $productoData['precio'],
            ':nombre' => $productoData['nombre'],
            ':categoria_id' => $productoData['categoria_id']
        ]);

        return $this->connection->lastInsertId(); // Devuelve el ID del último producto insertado
    }

    // Insertar una nueva alimentación
    public function insertarAlimentacion(int $productoId, int $mesCaducidad, int $anioCaducidad): void
    {
        $query = "
            INSERT INTO alimentaciones (producto_id, mes_caducidad, anio_caducidad)
            VALUES (:producto_id, :mes_caducidad, :anio_caducidad)
        ";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            ':producto_id' => $productoId,
            ':mes_caducidad' => $mesCaducidad,
            ':anio_caducidad' => $anioCaducidad
        ]);
    }

    // Insertar un nuevo producto electrónico
    public function insertarElectronica(int $productoId, int $plazoGarantia): void
    {
        $query = "
            INSERT INTO electronicas (producto_id, plazo_garantia)
            VALUES (:producto_id, :plazo_garantia)
        ";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            ':producto_id' => $productoId,
            ':plazo_garantia' => $plazoGarantia
        ]);
    }

    // Obtener todas las categorías
    public function getCategorias(): array
    {
        $query = "SELECT * FROM categorias";
        $stmt = $this->connection->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
