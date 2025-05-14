<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@miapp.com',
            'password' => bcrypt('password123')  // Asegúrate de usar una contraseña segura
        ]);
        User::factory()->create([
            'name' => 'Cliente',
            'email' => 'cliente@miapp.com',
            'password' => bcrypt('password123')  // Asegúrate de usar una contraseña segura
        ]);

        $this->call([
            FamiliaSeeder::class,
            ProductoSeeder::class,
            ImagenSeeder::class,
            RolSeeder::class,
        ]);
    }
}
