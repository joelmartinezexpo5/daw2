<?php
declare(strict_types = 1);

namespace App\Request;

use App\Rules\{
    MaxRule, MinRule, NumericRule, RequiredRule, UniqueRule,
};

final class ProductoRequest extends AbstractRequest
{
    public function __construct(private readonly ?int $id = null)
    {
        parent::__construct();
    }

    protected function rules(): array
    {
        return [
            'nombre' => [
                new RequiredRule(message: 'El nombre es requerido'),
                new MinRule(length: 3, message: 'El nombre debe tener como mínimo 3 caracteres'),
                new MaxRule(length:255, message: 'El nombre debe tener como máximo 255 caracteres'),
                new UniqueRule(table: 'productos', column: 'nombre', id: $this->id, message: 'El producto ya existe'),
            ],
            'descripcion' => [
                new RequiredRule(message: 'La descripción es requerida'),
            ],
            'precio' => [
                new RequiredRule(message: 'El precio es requerido'),
                new NumericRule(message: 'El precio debe ser numérico'),
            ],
        ];
    }
}