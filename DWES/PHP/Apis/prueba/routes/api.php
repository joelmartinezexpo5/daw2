<?php
declare(strict_types = 1);
use Pecee\SimpleRouter\SimpleRouter as Router;
use App\Controllers\Api\ApiController;
use App\Controllers\Api\Producto\CreateProductoController;

//añadimos un nuevo grupo con el prefijo productos e indicamos el espacio de nombres

Router::group(
    ['prefix' => 'api'],
    function (): void {
        Router::get('/', [ApiController::class,'__invoke']);

        Router::group(
            ['namespace' => 'Producto','prefix' => 'productos'],
            function (): void {
                Router::post('/', [CreateProductoController::class,'__invoke']);
            }
        );
    }
);