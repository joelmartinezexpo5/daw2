<?php

declare(strict_types = 1);

namespace Examen0701\Controllers\Api;
use Examen0701\Responses\JsonResponse;

final class ApiController
{
    public function __invoke(): void
    {
        JsonResponse::response(
            data:[
                'producto'=> [
                    'titulo'=>'producto 1',
                    'descripcion'=>'es un producto de prueba',
                    'precio'=>'15'
                ]
                ],
            );
    }
}