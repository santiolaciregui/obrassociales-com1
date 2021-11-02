<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reintegro extends Model
{
    protected $table = 'reintegros';
    
    protected $primaryKey="id";

    protected $fillable =['id','id_cliente','fecha_solicitud','comprobante_factura','fecha_emision','nombre_profesional','importe_facturado','estado'];
}
