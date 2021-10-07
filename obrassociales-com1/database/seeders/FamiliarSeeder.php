<?php

namespace Database\Seeders;

use App\Models\Familiar;
use Illuminate\Database\Seeder;

class FamiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $familiar = new Familiar();
        $familiar->nombre = 'Juan';
        $familiar->dni = '42295736';
        $familiar->apellido = 'De la Serna';
        $familiar->sexo = 'Masculino';
        $familiar->fecha_nacimiento = '02-10-1999';
        $familiar->domicilio = 'Argetina del Sur 1511';
        $familiar->estado_civil = 'Soltero';
        $familiar->cliente_id = 1;
        $familiar->save();  
    }
}
