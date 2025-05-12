<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Imagen;
use App\Models\Producto;

class ImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $producto = Producto::first(); // Tomamos el primer producto
        Imagen::create([
            'producto_id' => $producto->id,
            'archivo' => 'imagen_de_prueba.jpg'
        ]);
    }
}
