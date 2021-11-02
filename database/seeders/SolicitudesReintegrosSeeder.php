<?php

namespace Database\Seeders;

use App\Models\Reintegro;
use Illuminate\Database\Seeder;

class SolicitudesReintegrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $solicitud = new Reintegro();
        $solicitud->id_cliente = '1';
        $solicitud->estado = 'PENDIENTE';
        $solicitud->fecha_solicitud = '10/10/2021';
        $solicitud->fecha_emision = '10/15/2021';
        $solicitud->comprobante_factura = '15432010';
        $solicitud->nombre_profesional = 'Juan Perez';
        $solicitud->importe_facturado = '5000';
        $solicitud->save(); 

        $solicitud = new Reintegro();
        $solicitud->id_cliente = '2';
        $solicitud->estado = 'PENDIENTE';
        $solicitud->fecha_solicitud = '09/17/2021';
        $solicitud->fecha_emision = '08/10/2021';
        $solicitud->comprobante_factura = '1543442010';
        $solicitud->nombre_profesional = 'Florencia Gomez';
        $solicitud->importe_facturado = '2200';
        $solicitud->save(); 

        $solicitud = new Reintegro();
        $solicitud->id_cliente = '3';
        $solicitud->estado = 'PENDIENTE';
        $solicitud->fecha_solicitud = '10/5/2021';
        $solicitud->fecha_emision = '10/10/2021';
        $solicitud->comprobante_factura = '15499010';
        $solicitud->nombre_profesional = 'Diego Rodriguez';
        $solicitud->importe_facturado = '5500';
        $solicitud->save(); 
    }
}
