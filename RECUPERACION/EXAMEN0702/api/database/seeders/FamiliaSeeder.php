<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  \App\Models\Familia;


class FamiliaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $familias = [
        ['codigo' => 'BBDD', 'nombre' => 'Bases de datos'],
        ['codigo' => 'Seguridad', 'nombre' =>'Seguridad informática'],
        ['codigo' => 'Programacion', 'nombre' => 'Programación y desarrollo del software'],
        ['codigo' => 'Redes', 'nombre' => 'Redes y administración de sistemas'],
        ['codigo' => 'Sistemas', 'nombre' => 'Sistemas operativos'],
        ['codigo' => 'Otros', 'nombre' => 'Otros']
    ];
    public function run(): void
    {

    foreach ($this->familias as $familia) {
            $fam=new Familia();
            $fam->codigo=$familia['codigo'];
            $fam->nombre=$familia['nombre'];
            $fam->save();
        }
        $this->command->info('Tabla familias inicializada con datos!');
    }
}
