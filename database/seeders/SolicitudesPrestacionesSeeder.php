<?php

namespace Database\Seeders;

use App\Models\SolicitudPrestacion;
use Illuminate\Database\Seeder;

class SolicitudesPrestacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prestacion1 = new SolicitudPrestacion();
        $prestacion1->nombre_cliente = 'Juan Lopez';
        $prestacion1->estado = 'PENDIENTE';
        $prestacion1->save(); 

        $prestacion1 = new SolicitudPrestacion();
        $prestacion1->nombre_cliente = 'Martin Gutierrez';
        $prestacion1->estado = 'PENDIENTE';
        $prestacion1->save(); 

        $prestacion1 = new SolicitudPrestacion();
        $prestacion1->nombre_cliente = 'Rodrigo Linares';
        $prestacion1->estado = 'PENDIENTE';
        $prestacion1->save(); 
    }
}
