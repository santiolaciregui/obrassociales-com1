<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;


class Plan extends Model{
    protected $table = 'plan';
    
    protected $primaryKey="id";

    public function clientes(){ //plan->Clientes
        return $this->hasMany('App\Models\Cliente'::class);
    }

    public function prestacion(){//plan->prestacion
        return $this->belongsToMany('App\Models\Prestacion'::class,'plan_prestacion');
    }


    protected $fillable =['id','nombre','tipo','costo','prestaciones','edad_desde','edad_hasta','beneficiario','clientes','prestaciones'];

   
}