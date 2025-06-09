<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $familia=[
        'Electrodomésticos',
        'Informática',
        'Telefonía',
        'Moda',
        'Deporte',
        'Hogar',
        'Jardín',
        'Bricolaje',
        'Mascotas',
        'Juguetes',
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->familia as $familia) {
            Categoria::create(['nombre' => $familia]);
        }
    }
}
