<?php
declare(strict_types=1);

namespace Examen0701\Controllers\Api;

use Examen0701\Entities\Producto;

final class DeleteProductoController
{
    public function __invoke(int $id): void
    {
        $producto = new Producto();
        $productoBorrado = $producto->delete($id);
        $response = response();
        if ($productoBorrado !== false && !empty($productoBorrado)) {
            // Respuesta exitosa en JSON
            $response->httpCode(200)
                ->json([
                    'status' => 'success',
                    'data' => " Se borro con exito el producto",
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