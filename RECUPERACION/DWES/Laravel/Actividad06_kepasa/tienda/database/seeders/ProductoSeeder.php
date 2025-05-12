<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Familia;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'Laptop',
            'descripcion' => 'Laptop de última generación',
            'familia_id' => Familia::where('nombre', 'Electrónica')->first()->id
        ]);

        Producto::create([
            'nombre' => 'Camiseta',
            'descripcion' => 'Camiseta de algodón',
            'familia_id' => Familia::where('nombre', 'Ropa')->first()->id
        ]);
    }
}
