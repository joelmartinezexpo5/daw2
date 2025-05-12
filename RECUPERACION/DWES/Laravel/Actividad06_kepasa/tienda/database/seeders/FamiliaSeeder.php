<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Familia;

class FamiliaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Familia::create(['nombre' => 'Electrónica']);
        Familia::create(['nombre' => 'Ropa']);
        Familia::create(['nombre' => 'Alimentos']);
    }
}
