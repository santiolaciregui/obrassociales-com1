<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Prestacion extends Model{
    protected $table = 'prestacion';
    
    protected $primaryKey="id";

    public function plan(){//prestacion->plan
        return $this->belongsToMany('App\Models\Plan'::class, 'plan_prestacion');
    }

    protected $fillable =['id','nombre','prestaciones'];

   
}