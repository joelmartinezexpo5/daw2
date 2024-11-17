<?php

namespace App\Classes;

use App\Classes\Categoria;
use App\Classes\Alimentacion;
use App\Classes\Electronica;

class FuncionesBD
{
    public static function construirCategorias(array $categoriasData): array
    {
        $categorias = [];
        foreach ($categoriasData as $categoriaData) {
            $categorias[] = new Categoria($categoriaData['id'], $categoriaData['nombre']);
        }
        return $categorias;
    }

    public static function construirProductos(array $productosData): array
    {
        $productos = [];
        foreach ($productosData as $row) {
            $categoria = new Categoria($row['categoria_id'], $row['categoria_nombre']);
            if (!empty($row['mes_caducidad'])) {
                $productos[] = new Alimentacion(
                    $row['codigo'], $row['precio'], $row['nombre'], 
                    $row['mes_caducidad'], $row['año_caducidad'], $categoria
                );
            } elseif (!empty($row['plazo_garantia'])) {
                $productos[] = new Electronica(
                    $row['codigo'], $row['precio'], $row['nombre'], 
                    $row['plazo_garantia'], $categoria
                );
            }
        }
        return $productos;
    }
}
