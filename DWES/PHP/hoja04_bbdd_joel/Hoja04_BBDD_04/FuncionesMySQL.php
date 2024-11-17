<?php

use App\Classes\ConexionBD;
use App\Classes\FuncionesBD;

function obtenerCategorias(): array
{
    $connection = ConexionBD::getConnection();
    $stmt = $connection->query("SELECT * FROM categorias");
    $categoriasData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return FuncionesBD::construirCategorias($categoriasData);
}

function obtenerProductos(): array
{
    $connection = ConexionBD::getConnection();
    $stmt = $connection->query("
        SELECT p.*, c.nombre as categoria_nombre, 
               a.mes_caducidad, a.anio_caducidad, 
               e.plazo_garantia
        FROM productos p 
        JOIN categorias c ON p.categoria_id = c.id
        LEFT JOIN alimentaciones a ON p.id = a.producto_id
        LEFT JOIN electronicas e ON p.id = e.producto_id
    ");
    $productosData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return FuncionesBD::construirProductos($productosData);
}

function obtenerProductosPorCategoria(int $categoriaId): array
{
    $connection = ConexionBD::getConnection();
    $stmt = $connection->prepare("
        SELECT p.*, c.nombre as categoria_nombre, 
               a.mes_caducidad, a.anio_caducidad, 
               e.plazo_garantia
        FROM productos p 
        JOIN categorias c ON p.categoria_id = c.id
        LEFT JOIN alimentaciones a ON p.id = a.producto_id
        LEFT JOIN electronicas e ON p.id = e.producto_id
        WHERE p.categoria_id = :categoria_id
    ");
    $stmt->execute(['categoria_id' => $categoriaId]);
    $productosData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return FuncionesBD::construirProductos($productosData);
}
