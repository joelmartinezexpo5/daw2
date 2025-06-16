<?php
declare(strict_types=1);

namespace Examen0701\Controllers\Api;

use Examen0701\Entities\Producto;

final class GetProductoController
{
    public function __invoke(int $id): void
    {
        $producto = new Producto();
        $productoEncontrado = $producto->find($id);
        $response = response();
        if (  $productoEncontrado !== false && !empty(  $productoEncontrado)) {
            // Respuesta exitosa en JSON
            $response->httpCode(200)
                ->json([
                    'status' => 'success',
                    'data' =>   $productoEncontrado,
                ]);
        } else {
            // Respuesta error en JSON
            $response->httpCode(404)
                ->json([
                    'status' => 'error',
                    'message' => 'No se pudo tomar el producto.',
                ]);
        }
    }
}