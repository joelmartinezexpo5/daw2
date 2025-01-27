<?php

namespace Database\Seeders;

use App\Models\Revisione;
use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RevisionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animal = Animal::first(); // Obtiene el primer animal

        // Añadir dos revisiones para el primer animal
        $animal->revisiones()->create([
            'fecha' => '2025-01-01',
            'descripcion' => 'Revisión de rutina.',
        ]);

        $animal->revisiones()->create([
            'fecha' => '2025-01-15',
            'descripcion' => 'Revisión por malestar general.',
        ]);
    }
}
