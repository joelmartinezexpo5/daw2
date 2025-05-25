<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Usuario Test',
            'email' => 'test@ejemplo.com',
            'password' => Hash::make('password123'),  // contraseña que usarás para login
        ]);
    }
}
