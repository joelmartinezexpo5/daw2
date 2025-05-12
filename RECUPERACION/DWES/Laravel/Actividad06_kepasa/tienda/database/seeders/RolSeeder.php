<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = Role::firstOrCreate(['name' => 'administrador', 'guard_name' => 'web']);
        $cliente = Role::firstOrCreate(['name' => 'cliente', 'guard_name' => 'web']);

        // Asignar rol al primer usuario
        $user = \App\Models\User::first();
        if ($user && !$user->hasRole('administrador')) {
            $user->assignRole('administrador');
        }
    }
}
