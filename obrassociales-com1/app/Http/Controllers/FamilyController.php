<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Familiar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FamilyController extends Controller
{
    public function create()
    {
        return view('family.create');
    }

    public function store(Request $request)
    {
        
        try {        
            $familiar = new Familiar ();
            $familiar->dni= $request->dni;
            $familiar->nombre= $request->nombre;
            $familiar->apellido= $request->apellido;
            $familiar->sexo= $request->sexo;
            $familiar->fecha_nacimiento= $request->fecha_nacimiento;
            $familiar->domicilio= $request->domicilio;
            $familiar->estado_civil= $request->estado_civil;
            $familiar->cliente= $request->cliente;
            $familiar->save();
            return redirect()->route('dashboard');
        } catch (Exception $e) {
            echo($e);
            printf($e);
            return redirect()->back();
        }
    }
}
