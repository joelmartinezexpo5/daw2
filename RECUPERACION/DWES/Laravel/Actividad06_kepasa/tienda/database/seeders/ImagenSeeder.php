<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Imagen;

class ImagenSeeder extends Seeder
{
    public function run(): void
    {
        $productosAgrupados = Producto::with('familia')->get()->groupBy('familia_id');

        foreach ($productosAgrupados as $familiaId => $productos) {
            $familiaNombre = strtolower(str_replace(' ', '', $productos->first()->familia->nombre));
            $nombreArchivo = "{$familiaNombre}.jpg";

            foreach ($productos as $producto) {
                Imagen::create([
                    'producto_id' => $producto->id,
                    'archivo' => $nombreArchivo,
                ]);
            }
        }
    }
}
