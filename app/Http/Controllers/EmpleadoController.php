<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function create()
    {
        return view('empleado.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:users,email',
            'contraseña' => 'required'
        ]);
        try {
            $empleado = new User();
            $empleado->nombre = $request->nombre;
            $empleado->apellido = $request->apellido;
            $empleado->email = $request->email;
            $empleado->password = bcrypt($request->get('contraseña'));
            $empleado->role_id = Role::EMPLEADO;
            $empleado->save();
            return redirect()->route('empleado.create')->with('mensaje', 'Cargado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
