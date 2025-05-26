<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Familia;

class FamiliaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $familias = [
            ['codigo' => 'BBDD', 'nombre' => 'Bases de datos'],
            ['codigo' => 'Seguridad', 'nombre' =>'Seguridad informática'],
            ['codigo' => 'Programacion', 'nombre' => 'Programación y desarrollo del software'],
            ['codigo' => 'Redes', 'nombre' => 'Redes y administración de sistemas'],
            ['codigo' => 'Sistemas', 'nombre' => 'Sistemas operativos'],
            ['codigo' => 'Otros', 'nombre' => 'Otros']
        ];

        foreach ($familias as $familia) {
            Familia::create($familia);
        }
    }
}
