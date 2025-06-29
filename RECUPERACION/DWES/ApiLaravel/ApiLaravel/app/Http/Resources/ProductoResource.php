<?php
// <!-- filepath: /app/Http/Resources/ProductoResource.php -->
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
                'id' => $this->id,
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'precio' => $this->precio,
                'stock' => $this->stock,
                'categoria' =>new CategoriaResource($this->whenLoaded('categoria')),
                'url_imagen' => $this->imagen ? url('storage/' . $this->imagen) : null,
            ];
        }
    }