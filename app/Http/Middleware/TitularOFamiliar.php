<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;

class TitularOFamiliar
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
            if (auth()->user()->role_id == Role::CLIENTE) {
                return $next($request);
            } else
                return redirect()->route('welcome')->with('error', 'Permiso denegado');
        } else
            return redirect()->route('welcome')->with('error', 'Permiso denegado');
    }
}
