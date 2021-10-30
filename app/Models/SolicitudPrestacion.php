<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudPrestacion extends Model
{
    protected $table = 'solicitud_prestaciones';
    
    protected $primaryKey="id";

    protected $fillable =['id','id_cliente','image'];
}
