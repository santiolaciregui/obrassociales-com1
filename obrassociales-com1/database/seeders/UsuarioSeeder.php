<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'nombre' => 'Admin',
            'apellido' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role_id' => Role::ADMINISTRADOR
        ));   

        User::create(array(
            'nombre' => 'Empleado',
            'apellido' => 'Empleado',
            'email' => 'empleado@empleado.com',
            'password' => bcrypt('empleado'),
            'role_id' => Role::EMPLEADO
        ));  

    }
}


