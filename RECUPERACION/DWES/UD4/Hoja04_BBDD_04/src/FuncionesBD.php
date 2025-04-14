<?php
require_once 'ConexionDB.php';
require_once 'Categoria.php';
require_once 'Alimentacion.php';
require_once 'Electronica.php';

function getCategorias(): array {
    $conexion = ConexionBD::getConnection();
    $stmt = $conexion->query("SELECT * FROM categorias");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductos(): array {
    $conexion = ConexionBD::getConnection();
    $productos = [];

    $stmt = $conexion->query("
        SELECT p.*, a.mesCaducidad, a.anioCaducidad, e.plazoGarantia, c.nombre AS cat_nombre
        FROM productos p
        LEFT JOIN alimentaciones a ON p.codigo = a.codigo
        LEFT JOIN electronicas e ON p.codigo = e.codigo
        JOIN categorias c ON p.categoria_id = c.id
    ");

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categoria = new Categoria($row['categoria_id'], $row['cat_nombre']);

        if ($row['mesCaducidad'] !== null) {
            $producto = new Alimentacion($row['codigo'], $row['precio'], $row['nombre'], $row['mesCaducidad'], $row['anioCaducidad'], $categoria);
        } else {
            $producto = new Electronica($row['codigo'], $row['precio'], $row['nombre'], $row['plazoGarantia'], $categoria);
        }

        $productos[] = $producto;
    }

    return $productos;
}

function getProductosPorCategoria(int $categoriaId): array {
    $conexion = ConexionBD::getConnection();
    $productos = [];

    $stmt = $conexion->prepare("
        SELECT p.*, a.mesCaducidad, a.anioCaducidad, e.plazoGarantia, c.nombre AS cat_nombre
        FROM productos p
        LEFT JOIN alimentaciones a ON p.codigo = a.codigo
        LEFT JOIN electronicas e ON p.codigo = e.codigo
        JOIN categorias c ON p.categoria_id = c.id
        WHERE p.categoria_id = :cat_id
    ");
    $stmt->execute(['cat_id' => $categoriaId]);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categoria = new Categoria($row['categoria_id'], $row['cat_nombre']);

        if ($row['mesCaducidad'] !== null) {
            $producto = new Alimentacion($row['codigo'], $row['precio'], $row['nombre'], $row['mesCaducidad'], $row['anioCaducidad'], $categoria);
        } else {
            $producto = new Electronica($row['codigo'], $row['precio'], $row['nombre'], $row['plazoGarantia'], $categoria);
        }

        $productos[] = $producto;
    }

    return $productos;
}
