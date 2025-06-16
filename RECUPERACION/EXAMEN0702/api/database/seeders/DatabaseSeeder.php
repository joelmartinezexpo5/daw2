<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



        // Elimina los datos de las tablas para evitar duplicados
        DB::table('productos')->delete();
        DB::table('familias')->delete();
        DB::table('imagenes')->delete();
        DB::table('users')->delete();
        $this->call(FamiliaSeeder::class);
        $this->call(ProductoSeeder::class);
        User::factory()->create([
            'name' => 'iker',
            'email' => 'rompeolas93@gmail.com',
            'password' => 'Laparca2424'
        ]);

    }
}
