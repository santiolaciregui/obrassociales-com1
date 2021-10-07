<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder {
    public function run() {
        $role = new Role();
        $role->id = Role::ADMINISTRADOR;
        $role->name = 'administrador';
        $role->save();       

        $role2 = new Role();
        $role2->name = 'empleado';
        $role2->id = Role::EMPLEADO;
        $role2->save();

        $role3 = new Role();
        $role3->name = 'cliente';
        $role3->id = Role::CLIENTE;
        $role3->save();
    }
    
}