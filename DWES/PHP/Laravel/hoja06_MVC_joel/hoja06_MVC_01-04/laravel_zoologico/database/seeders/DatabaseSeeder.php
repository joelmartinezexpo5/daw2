<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cuidador;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\AnimalSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Cuidador::factory()->count(20)->create();



        DB::table('animales')->delete();
        $this->call(AnimalSeeder::class);

        $this->call([UserSeeder::class]);



        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
