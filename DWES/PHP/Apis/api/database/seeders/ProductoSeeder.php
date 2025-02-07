<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    private $productos = [
        [
            'nombre' => 'Lavadora',
            'descripcion' => 'Lavadora de carga frontal',
            'precio' => 399.99,
            'stock' => 10,
            'categoria_id' => 1,
        ],
        [
            'nombre' => 'Portátil',
            'descripcion' => 'Portátil de 15 pulgadas',
            'precio' => 899.99,
            'stock' => 5,
            'categoria_id' => 2,
        ],
        [
            'nombre' => 'Smartphone',
            'descripcion' => 'Smartphone de 6 pulgadas',
            'precio' => 299.99,
            'stock' => 15,
            'categoria_id' => 3,
        ],
        [
            'nombre' => 'Camiseta',
            'descripcion' => 'Camiseta de algodón',
            'precio' => 9.99,
            'stock' => 100,
            'categoria_id' => 4,
        ],
        [
            'nombre' => 'Balón',
            'descripcion' => 'Balón de fútbol',
            'precio' => 19.99,
            'stock' => 50,
            'categoria_id' => 5,
        ],
        [
            'nombre' => 'Sofá',
            'descripcion' => 'Sofá de 3 plazas',
            'precio' => 299.99,
            'stock' => 5,
            'categoria_id' => 6,
        ],
        [
            'nombre' => 'Mesa',
            'descripcion' => 'Mesa de comedor',
            'precio' => 99.99,
            'stock' => 10,
            'categoria_id' => 7,
        ],
        [
            'nombre' => 'Taladro',
            'descripcion' => 'Taladro percutor',
            'precio' => 49.99,
            'stock' => 20,
            'categoria_id' => 8,
        ],
        [
            'nombre' => 'Acuario',
            'descripcion' => 'Acuario de 100 litros',
            'precio' => 99.99,
            'stock' => 5,
            'categoria_id' => 9,
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->productos as $producto) {
            \App\Models\Producto::create($producto);
        }
    }
}
