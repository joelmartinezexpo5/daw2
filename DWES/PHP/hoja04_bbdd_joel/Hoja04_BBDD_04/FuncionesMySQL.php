<?php

namespace App;

use App\Classes\Categoria;
use App\Classes\Producto;
use App\Alimentacion;
use App\Electronica;

class FuncionesMySQL
{
    public static function construirCategorias(array $categoriasData): array
    {
        $categorias = [];
        foreach ($categoriasData as $data) {
            $categorias[] = new Categoria($data['id'], $data['nombre']);
        }
        return $categorias;
    }

    public static function construirProductos(array $productosData): array
    {
        $productos = [];
        foreach ($productosData as $data) {
            if ($data['mes_caducidad'] && $data['anio_caducidad']) {
                // Producto de tipo Alimentación
                $productos[] = new Alimentacion(
                    $data['codigo'],
                    $data['precio'],
                    $data['nombre'],
                    $data['mes_caducidad'],
                    $data['anio_caducidad'],
                    $data['categoria_nombre']
                );
            } elseif ($data['plazo_garantia']) {
                // Producto de tipo Electrónica
                $productos[] = new Electronica(
                    $data['codigo'],
                    $data['precio'],
                    $data['nombre'],
                    $data['plazo_garantia'],
                    $data['categoria_nombre']
                );
            } else {
                // Producto genérico
                $productos[] = new Producto(
                    $data['codigo'],
                    $data['precio'],
                    $data['nombre'],
                    $data['categoria_nombre']
                );
            }
        }
        return $productos;
    }
}
