<?php
declare(strict_types=1);
use Pecee\SimpleRouter\SimpleRouter as Router;
use Examen0701\Controllers\Api\ApiController;
use Examen0701\Controllers\Api\CreateProductoController;
use Examen0701\Controllers\Api\ListProductoController;
use Examen0701\Controllers\Api\GetProductoController;
use Examen0701\Controllers\Api\UpdateProductoController;
use Examen0701\Controllers\Api\DeleteProductoController;
//añadimos un nuevo grupo con el prefijo productos e indicamos el espacio de nombres

Router::group(
    ['prefix' => 'api'],
    function (): void {
        Router::get('/', [ApiController::class, '__invoke']);

        Router::group(
            ['namespace' => 'Producto', 'prefix' => 'productos'],
            function (): void {
                Router::get('/listado', [ListProductoController::class, '__invoke']);
                Router::get('/{id}', [GetProductoController::class, '__invoke']);
                Router::put('/{id}', [UpdateProductoController::class, '__invoke']);
                Router::delete('/{id}',[DeleteProductoController::class,'__invoke']);
                Router::post('/', [CreateProductoController::class, '__invoke']);

            }
        );
    }
);

Router::get('/api/test', function() {
    echo json_encode(['mensaje' => 'Ruta test OK']);
});