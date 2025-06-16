<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'titulo'      => $this->titulo,
            'descripcion' => $this->descripcion,
            'precio'      => $this->precio,
            'slug'        => $this->slug,
            'familia'     => [
                'id'     => $this->familia->id,
                'nombre' => $this->familia->nombre ?? null,
            ],
            'imagen'      => $this->imagen ? [
                'id'   => $this->imagen->id,
                'nombre'=>$this->imagen->nombre,
                'url'  => $this->imagen->url ?? null, 
            ] : null
        ];
    }
}
