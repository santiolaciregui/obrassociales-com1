<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class Administrador
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
            if (auth()->user()->role_id != Role::ADMINISTRADOR) {
                return redirect()->route('welcome')->with('error', 'Permiso denegado');
            }
        }
        else{
            return redirect()->route('welcome')->with('error', 'Permiso denegado');
        }

        return $next($request);
    }
}
