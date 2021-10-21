<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;


class PlanesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planA = new Plan();
        $planA->nombre = 'Plan A';
        $planA->tipo = 'A';
        $planA->costo = 133;
        $planA->edad_desde = '0';
        $planA->edad_hasta = '18';
        $planA->beneficiario = 'Familiar';
        $planA->save();  

        $planB = new Plan();
        $planB->nombre = 'Plan B';
        $planB->tipo = 'B';
        $planB->costo = 2213;
        $planB->edad_desde = '18';
        $planB->edad_hasta = '60';
        $planB->beneficiario = 'Solo';
        $planB->save();  

        $planC = new Plan();
        $planC->nombre = 'Plan C';
        $planC->tipo = 'C';
        $planC->costo = 0;
        $planC->edad_desde = '60';
        $planC->edad_hasta = '120';
        $planC->beneficiario = 'Pareja';
        $planC->save();  
    }    
}