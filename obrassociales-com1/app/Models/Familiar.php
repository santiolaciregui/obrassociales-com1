<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;


class Familiar extends Model{
    protected $table = 'familiares';
    
    protected $primaryKey="id";

    public function cliente(){//familiar->cliente
        return $this->belongsTo('App\Models\Cliente'::class);
    }

    protected $fillable =['id','dni','nombre','apellido','sexo','fecha_nacimiento','domicilio','estado_civil','cliente'];

   
}