<?php

namespace App\Http\Middleware;

use App\Models\Cliente as ModelsCliente;
use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class Cliente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() != null) {
            $cliente = ModelsCliente::where('email', auth()->user()->email)->get()[0];
            if (auth()->user()->role_id == Role::CLIENTE && $cliente->id != $cliente->id_titular) {
                return $next($request);
            }
        }
        else{
            return redirect()->route('welcome')->with('error', 'Permiso denegado');
        }

        return redirect()->route('welcome')->with('error', 'Permiso denegado');
    }
}
