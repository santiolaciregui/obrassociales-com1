<?php

namespace Database\Seeders;

use App\Models\Cliente;
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
        $cliente->email = 'rodrigo@delaserna.com';
        $cliente->plan_id = '2';
        $cliente->password = 'rodrigo';
        $cliente->role_id = '1';
        $cliente->save();  
    }
}
