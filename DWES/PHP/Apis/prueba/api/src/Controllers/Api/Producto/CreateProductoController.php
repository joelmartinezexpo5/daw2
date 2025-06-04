<?php

declare(strict_types=1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;
use App\Request\ProductoRequest;

final class CreateProductoController
{
    public function __invoke(): void
    {
        $request = new ProductoRequest();

        // Validar los datos del formulario
        $data = $request->validated();

        // Procesar imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['imagen']['tmp_name'];
            $fileName = basename($_FILES['imagen']['name']);
            $uploadDir = __DIR__ . '/../../../public/uploads/'; 

            // Crear carpeta si no existe
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Generar nombre único para evitar colisiones
            $newFileName = uniqid() . '-' . $fileName;
            $destPath = $uploadDir . $newFileName;

            // Mover archivo temporal a carpeta destino
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Guardar ruta relativa en el array de datos para la BD
                $data['imagen'] = 'uploads/' . $newFileName;
            } else {
                JsonResponse::response(['error' => 'Error al subir la imagen'], 500);
                return;
            }
        }

        $producto = new Producto();

        $productoId = $producto->create(data: $data);

        JsonResponse::response(
            data: $producto->find(id: (int) $productoId)
        );
    }
}
