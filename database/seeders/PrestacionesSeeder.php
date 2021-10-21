<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestacion;

class PrestacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prestacion1 = new Prestacion();
        $prestacion1->nombre = 'Odontologico';
        $prestacion1->save();  

        $prestacion2 = new Prestacion();
        $prestacion2->nombre = 'Farmacia';
        $prestacion2->save();  

        $prestacion3 = new Prestacion();
        $prestacion3->nombre = 'Oncologico';
        $prestacion3->save();  

        $prestacion4 = new Prestacion();
        $prestacion4->nombre = 'Cardiaco';
        $prestacion4->save();  
    }
}
