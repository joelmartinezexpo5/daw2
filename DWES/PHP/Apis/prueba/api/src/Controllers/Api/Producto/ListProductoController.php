<?php
declare(strict_types=1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;

final class ListProductoController
{
    public function __invoke(): void
    {
        $producto = new Producto();
        $productos = $producto->get();
        $response = response();
        if ($productos !== false && !empty($productos)) {
            // Respuesta exitosa en JSON
            $response->httpCode(200)
                ->json([
                    'status' => 'success',
                    'data' => $productos,
                ]);
        } else {
            // Respuesta error en JSON
            $response->httpCode(500)
                ->json([
                    'status' => 'error',
                    'message' => 'No se pudieron obtener los productos.',
                ]);
        }
    }
}