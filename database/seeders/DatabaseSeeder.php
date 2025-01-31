<?php

namespace Database\Seeders;

use App\Models\Estado;
use App\Models\Leccion;
use App\Models\Tipo_Leccion;
use App\Models\Tipo_Usuario;
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

        Tipo_Usuario::create([
            'codigo' => '1',
            'nombre' => 'Administrador'
        ]);

        Tipo_Usuario::create([
            'codigo' => '2',
            'nombre' => 'Estudiante'
        ]);

        User::create([
            'name' => 'Admin',
            'primer_apellido' => 'Admin',
            'segundo_apellido' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'administrador@',
            'tipo_usuario_id' => 1,
        ]);

        Estado::create([
            'codigo' => 1,
            'nombre' => 'Activo'
        ]);

        Estado::create([
            'codigo' => 2,
            'nombre' => 'Inactivo'
        ]);
    }
}
