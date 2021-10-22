<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Cliente;
use App\Models\Plan;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function getAll(){
        $cliente = Cliente::whereColumn('id_titular','=','id')->get();
        return view('client.show')->with('clientes', $cliente);
    }

    public function create()
    {
        $planes = Plan::all();
        return view('client.create')
        ->with('planes', $planes);
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
            'empresa'=> 'required',
            'cuil'=> 'required',
            'telefono'=> 'required',
            'email' => 'required|email|unique:users,email',
            'plan' => 'required',
            'contraseña'=> 'required',
        ]);
        try {
            $cliente = new Cliente ();
            $cliente->dni= $request->dni;
            $cliente->nombre= $request->nombre;
            $cliente->apellido= $request->apellido;
            $cliente->sexo= $request->sexo;
            $cliente->fecha_nacimiento= $request->fecha_nacimiento;
            $cliente->domicilio= $request->domicilio;
            $cliente->estado_civil= $request->estado_civil;
            $cliente->empresa= $request->empresa;
            $cliente->cuil= $request->cuil;
            $cliente->telefono= $request->telefono;
            $cliente->plan_id= $request->plan;
            $cliente->email= $request->email;
            $cliente->password=bcrypt($request->get('contraseña'));
            $cliente->role_id=Role::CLIENTE;
            $cliente->id_titular= '99';
            $cliente->save();
            $cliente->id_titular= $cliente->id;
            $cliente->save();

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
            return redirect()->back();
        }
    }


     public function update($id){
        $cliente = Cliente::findOrFail($id);
        return view('client.update')
        ->with('cliente', $cliente);
    }

    public function update_plan($id){
        $cliente = Cliente::findOrFail($id);
        $planes = Plan::all();
        return view('client.update-plan')
        ->with('cliente', $cliente)
        ->with('planes', $planes);
    }


    public function patch(Request $request)
    {
        $request->validate([
            'dni'=> 'required',
            'nombre'=> 'required',
            'apellido'=> 'required',
            'sexo'=> 'required',
            'fecha_nacimiento'=> 'required',
            'domicilio'=> 'required',
            'estado_civil'=> 'required',
            'empresa'=> 'required',
            'cuil'=> 'required',
            'telefono'=> 'required',
            'email'=> 'required',
            'contraseña'=> 'required',
            'contraseña_nueva'=> 'required',

        ]);
        try {
            $cliente = Cliente::findOrFail($request->id);
            $passwordViejaHash=Hash::make($request->contraseña);
            $passwordNuevaHash=Hash::make($request->contraseña_nueva);
            if($passwordViejaHash != $passwordNuevaHash){
                $cliente->dni= $request->dni;
                $cliente->nombre= $request->nombre;
                $cliente->apellido= $request->apellido;
                $cliente->sexo= $request->sexo;
                $cliente->fecha_nacimiento= $request->fecha_nacimiento;
                $cliente->domicilio= $request->domicilio;
                $cliente->estado_civil= $request->estado_civil;
                $cliente->empresa= $request->empresa;
                $cliente->cuil= $request->cuil;
                $cliente->telefono= $request->telefono;
                $cliente->email= $request->email;
                $cliente->password=$passwordNuevaHash;
                $cliente->role_id=Role::CLIENTE;
                $cliente->save();
            }
            else{
                $cliente->dni= $request->dni;
                $cliente->nombre= $request->nombre;
                $cliente->apellido= $request->apellido;
                $cliente->sexo= $request->sexo;
                $cliente->fecha_nacimiento= $request->fecha_nacimiento;
                $cliente->domicilio= $request->domicilio;
                $cliente->estado_civil= $request->estado_civil;
                $cliente->empresa= $request->empresa;
                $cliente->cuil= $request->cuil;
                $cliente->telefono= $request->telefono;
                $cliente->email= $request->email;
                $cliente->role_id=Role::CLIENTE;
                $cliente->save();
            }
            return redirect()->route('welcome');
        } catch (Exception $e) {
            echo($e);
            return redirect()->back();
        }
    }
    public function patch_plan(Request $request)
    {
        $request->validate([
            'plan'=> 'required'
        ]);
        try {
            $cliente = Cliente::findOrFail($request->id);
            $cliente->plan_id= $request->plan;
            $cliente->save();
            return redirect()->route('welcome');
        } catch (Exception $e) {
            echo($e);
            printf($e);
            return redirect()->back();
        }
    }


}
