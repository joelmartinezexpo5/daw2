<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Familia;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $familias = Familia::all();

        foreach ($familias as $familia) {
            for ($i = 1; $i <= 3; $i++) {
                Producto::create([
                    'nombre' => $familia->nombre . ' Modelo ' . $i,
                    'descripcion' => 'Descripción del producto ' . $i . ' en la categoría ' . $familia->nombre,
                    'precio' => rand(100, 1500),
                    'familia_id' => $familia->id,
                ]);
            }
        }
    }
}
