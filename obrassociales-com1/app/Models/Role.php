<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const CLIENTE = 2;
    const EMPLEADO = 1;
    const ADMINISTRADOR = 0;

    protected $fillable = [
        'name',
        'id'
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User'::class);
    }
}