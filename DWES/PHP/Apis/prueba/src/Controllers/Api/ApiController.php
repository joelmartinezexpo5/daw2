<?php
declare(strict_types = 1);

namespace App\Controllers\Api;
use App\Responses\JsonResponse;

final class ApiController
{
    public function __invoke(): void
    {
        JsonResponse::response(
            data:[
                'producto'=> [
                    'nombre'=>'producto 1',
                    'descripcion'=>'es un producto de prueba',
                ]
                ],
            );
    }
}