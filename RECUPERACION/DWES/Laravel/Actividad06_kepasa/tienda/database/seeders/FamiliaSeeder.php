<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Familia;

class FamiliaSeeder extends Seeder
{
    public function run(): void
    {
        $familias = ['Smartphones', 'Portatiles', 'Tablets', 'Auriculares', 'Monitores', 'Accesorios'];

        foreach ($familias as $nombre) {
            Familia::create(['nombre' => $nombre]);
        }
    }
}
