<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;
use Illuminate\Support\Str;

class AnimalSeeder extends Seeder
{
    private $animales = [
        [
            'especie' => 'Bisonte',
            'peso' => 1000,
            'altura' => 190,
            'fechaNacimiento' => '2014-09-07',
            'imagen' => 'bisonte.jpg',
            'alimentacion' => 'herbívoro',
            'descripcion' => 'Los bisontes son potentes ungulados...'
        ],
        [
            'especie' => 'Elefante',
            'peso' => 5000,
            'altura' => 400,
            'fechaNacimiento' => '2011-07-07',
            'imagen' => 'elefante.jpg',
            'alimentacion' => 'herbívoro',
            'descripcion' => 'El elefante africano es el mayor mamífero...'
        ]
        // Agrega aquí más animales según sea necesario
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->animales as $animal) {
            $a = new Animal();
            $a->especie = $animal['especie'];
            $a->slug = Str::slug($animal['especie']);
            $a->peso = $animal['peso'];
            $a->altura = $animal['altura'];
            $a->fechaNacimiento = $animal['fechaNacimiento'];
            $a->imagen = $animal['imagen'];
            $a->alimentacion = $animal['alimentacion'];
            $a->descripcion = $animal['descripcion'];
            $a->save();
        }

        $this->command->info('Tabla animales inicializada con datos');
    }
}
