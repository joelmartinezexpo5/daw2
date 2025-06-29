<?php
declare(strict_types=1);

namespace Examen0701\Controllers\Api;

use Examen0701\Entities\Producto;
use Examen0701\Request\ProductoRequest;
final class UpdateProductoController
{
    public function __invoke(int $id): void
    {
        $response = response();
        $producto = new Producto();
        $request = new ProductoRequest($id);
        $validated = $request->validated();  
        $validated['id'] = $id;
        $productoActualizado = $producto->update($validated);
        if ($productoActualizado !== false) {
            // Respuesta exitosa en JSON
            $response->httpCode(200)
                ->json([
                    'status' => 'success',
                    'message' => "Se actualizo el producto",
                ]);
        } else {
            // Respuesta error en JSON
            $response->httpCode(404)
                ->json([
                    'status' => 'error',
                    'message' => 'No se pudo actualizar el producto.',
                ]);
        }
    }
}