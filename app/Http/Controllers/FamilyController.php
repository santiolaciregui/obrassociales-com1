<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Plan;
use App\Models\Role;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FamilyController extends Controller
{
    public function create($id_titular)
    {
        $planes = Plan::all();
        return view('family.create')->with('id_titular',$id_titular)->with('planes', $planes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni'=> 'required',
            'nombre'=> 'required',
            'apellido'=> 'required',
            'sexo'=> 'required',
            'fecha_nacimiento'=> 'required',
            'domicilio'=> 'required',
            'estado_civil'=> 'required',
            'email' => 'required|email|unique:users,email',
            'plan' => 'required',
            'contraseña'=> 'required',
            'id_titular'=> 'required'
        ]);
        try {
            $familiar = new Cliente ();
            $familiar->dni= $request->dni;
            $familiar->nombre= $request->nombre;
            $familiar->apellido= $request->apellido;
            $familiar->sexo= $request->sexo;
            $familiar->fecha_nacimiento= $request->fecha_nacimiento;
            $familiar->domicilio= $request->domicilio;
            $familiar->estado_civil= $request->estado_civil;
            $familiar->plan_id= $request->plan;
            $familiar->email= $request->email;
            $familiar->id_titular= $request->id_titular;
            $familiar->password=bcrypt($request->get('contraseña'));
            $familiar->role_id=Role::CLIENTE;
            $familiar->save();

            $usuario = new User();
            $usuario->nombre= $request->nombre;
            $usuario->apellido= $request->apellido;
            $usuario->email= $request->email;
            $usuario->password=bcrypt($request->get('contraseña'));
            $usuario->role_id=Role::CLIENTE;
            $usuario->save();

            return redirect()->route('welcome');
        } catch (Exception $e) {
            echo($e);
            printf($e);
        }
    }

    public function getAll($id_titular){
        $family = Cliente::where('id_titular', $id_titular)->whereColumn('id_titular','!=','id')->get();
        return view('family.show')->with('family', $family)->with('id_titular', $id_titular);
    }

    public function delete($id_familiar, $id_titular)
    {
        $familiar = Cliente::findOrFail($id_familiar);
        $familiar->destroy($familiar->id);
        $familiar->save();


        // LO IDEAL SERIA QUE YO USE ESTA RUTA, PERO AL USARLA ME TIRA ERROR
        // return redirect()->route('family.list')->with('id_titular', $id_titular)
        ;
        return redirect()->route('client.show');
    }
}
