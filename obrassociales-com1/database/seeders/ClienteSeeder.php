<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente = new Cliente();
        $cliente->nombre = 'Rodrigo';
        $cliente->dni = '42295776';
        $cliente->apellido = 'De la Serna';
        $cliente->sexo = 'Masculino';
        $cliente->fecha_nacimiento = '02-10-1999';
        $cliente->domicilio = 'Argetina del Sur 1511';
        $cliente->estado_civil = 'Soltero';
        $cliente->empresa = 'Fragma';
        $cliente->cuil = '20422957767';
        $cliente->telefono = '2914706799';
        $cliente->email = 'cliente@cliente.com';
        $cliente->plan_id = '2';
        $cliente->password = 'rodrigo';

        $cliente->id_titular = '99';
        $cliente->role_id = Role::CLIENTE;
        $cliente->save();
        $cliente->id_titular = $cliente->id;

        $cliente->save();


        User::create(array(
            'nombre' => 'Rodrigo',
            'apellido' => 'De la Serna',
            'email' => 'cliente@cliente.com',
            'password' => bcrypt('cliente'),
            'role_id' => Role::CLIENTE
        ));

        $cliente1 = new Cliente();
        $cliente1->nombre = 'Familiar De';
        $cliente1->dni = '43325776';
        $cliente1->apellido = 'Rodrigo';
        $cliente1->sexo = 'Masculino';
        $cliente1->fecha_nacimiento = '02-10-1997';
        $cliente1->domicilio = 'Argetina del Sur 1511';
        $cliente1->estado_civil = 'Soltero';
        $cliente1->email = 'familiar@familiar.com';
        $cliente1->plan_id = '1';
        $cliente1->password = 'familiar';
        $cliente1->id_titular = $cliente->id;
        $cliente1->role_id = Role::CLIENTE;
        $cliente1->save();


        User::create(array(
            'nombre' => 'Familiar De',
            'apellido' => 'Rodrigo',
            'email' => 'familiar@familiar.com',
            'password' => bcrypt('familiar'),
            'role_id' => Role::CLIENTE
        ));

        $cliente2 = new Cliente();
        $cliente2->nombre = 'Lionel Andres';
        $cliente2->dni = '33295776';
        $cliente2->apellido = 'Messi';
        $cliente2->sexo = 'Masculino';
        $cliente2->fecha_nacimiento = '05-24-1987';
        $cliente2->domicilio = 'Otromundo 1030';
        $cliente2->estado_civil = 'Casado';
        $cliente2->empresa = 'Messi Store';
        $cliente2->cuil = '20332957767';
        $cliente2->telefono = '2914730799';
        $cliente2->email = 'lionel@messi.com';
        $cliente2->plan_id = '3';
        $cliente2->password = 'lionel';
        $cliente2->id_titular = '99';
        $cliente2->role_id = Role::CLIENTE;
        $cliente2->save();
        $cliente2->id_titular = $cliente2->id;
        $cliente2->save();


        User::create(array(
            'nombre' => 'Lionel Andres',
            'apellido' => 'Messi',
            'email' => 'lionel@messi.com',
            'password' => bcrypt('lionel'),
            'role_id' => Role::CLIENTE
        ));

        $cliente3 = new Cliente();
        $cliente3->nombre = 'Mateo';
        $cliente3->dni = '50325776';
        $cliente3->apellido = 'Messi';
        $cliente3->sexo = 'Masculino';
        $cliente3->fecha_nacimiento = '05-10-2015';
        $cliente3->domicilio = 'Paris';
        $cliente3->estado_civil = 'Soltero';
        $cliente3->email = 'mateo@messi.com';
        $cliente3->plan_id = '1';
        $cliente3->password = 'mateo';
        $cliente3->id_titular = $cliente2->id;
        $cliente3->role_id = Role::CLIENTE;
        $cliente3->save();


        User::create(array(
            'nombre' => 'Mateo',
            'apellido' => 'Messi',
            'email' => 'mateo@messi.com',
            'password' => bcrypt('mateo'),
            'role_id' => Role::CLIENTE
        ));

    }


}
