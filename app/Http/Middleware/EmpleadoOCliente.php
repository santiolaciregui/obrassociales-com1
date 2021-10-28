<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Cliente as ModelsCliente;

class EmpleadoOCliente
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
            if (auth()->user()->role_id == Role::EMPLEADO) {
                return $next($request);
            }
            else
            if (auth()->user()->role_id == Role::CLIENTE) {
                $cliente = ModelsCliente::where('email', auth()->user()->email)->get()[0];
                if ($cliente->id == $cliente->id_titular) {
                    return $next($request);
                }
            } else
                return redirect()->route('welcome')->with('error', 'Permiso denegado');
        } else
            return redirect()->route('welcome')->with('error', 'Permiso denegado');
    }
}
