<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'cajero']);
        Role::firstOrCreate(['name' => 'cliente']);

        // Crear usuario admin
        $user = User::firstOrCreate(
            ['email' => 'admin@envioexpress.com'],
            ['name' => 'Administrador', 'password' => bcrypt('password')]
        );

        // Asignar rol admin
        $user->assignRole('admin');
    }
}
