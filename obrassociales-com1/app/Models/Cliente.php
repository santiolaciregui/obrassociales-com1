<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cliente extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'cliente';
   
    protected $primaryKey="id";

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole($role)
    {
        if($this->role->name ==$role){
            return true;
        }
        return false;
    }
    
    public function familiar(){//cliente->Familiar
        return $this->hasMany('App\Models\Familiar'::class);
    }

    public function plan(){//cliente->plan
        return $this->belongsTo('App\Models\Plan'::class);
    }


    protected $fillable =['id','dni','nombre','apellido','sexo','fecha_nacimiento','domicilio','estado_civil','empresa','cuil','telefono','email','familiares'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
