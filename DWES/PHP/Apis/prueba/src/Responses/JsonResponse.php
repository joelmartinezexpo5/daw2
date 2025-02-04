<?php
declare(strict_types = 1);

namespace App\Responses;

final class JsonResponse
{
    //constantes para definir las distintas situaciones de la aplicación
    private const SUCCESS = 'exito';

    private const ERROR = 'error';

    // en HTTP un código de error >=400 es un error
    private static function statusByHttpCode(int $httpCode): string
    {
        if ($httpCode >= 400) {
            return self::ERROR;
        }

        return self::SUCCESS;
    }

    // en HTTP un código 204 - es sin información y un código 200 -es con éxito
    /**
     * @param array<string, mixed>|null $data
     */
    private static function success(?array $data = null): void
    {
        if (! $data) {
            response()
                ->httpCode(code: 204);
            exit;
        }

        response()
            ->httpCode(code: 200)
            ->json(value: [
                'status' => self::SUCCESS,
                'data'   => $data,
            ]);
    }

    private static function error(string $message, int $httpCode = 400): void
    {
        response()
            ->httpCode(code: $httpCode)
            ->json(value: [
                'status'  => self::ERROR,
                'message' => $message,
            ]);
    }
    // el método a utilizar que analiza la respuesta
    public static function response(?array $data = null, int $httpCode = 200): void
    {
        if (self::statusByHttpCode(httpCode: $httpCode) === self::SUCCESS) {
            self::success(data: $data);
        } else {
            self::error(message: $data['message'], httpCode: $httpCode);
        }
    }
}