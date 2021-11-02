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
        $prestacion1->id_cliente = '1';
        $prestacion1->estado = 'PENDIENTE';
        $prestacion1->save(); 

        $prestacion1 = new SolicitudPrestacion();
        $prestacion1->id_cliente = '2';
        $prestacion1->estado = 'PENDIENTE';
        $prestacion1->save(); 

        $prestacion1 = new SolicitudPrestacion();
        $prestacion1->id_cliente = '3';
        $prestacion1->estado = 'PENDIENTE';
        $prestacion1->save(); 
    }
}
