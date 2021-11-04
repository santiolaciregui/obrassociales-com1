<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Plan;
use App\Models\Role;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            $familiar->password=Hash::make($request->contraseña_nueva);
            $familiar->role_id=Role::CLIENTE;
            $familiar->save();

            $usuario = new User();
            $usuario->nombre= $request->nombre;
            $usuario->apellido= $request->apellido;
            $usuario->email= $request->email;
            $usuario->password=Hash::make($request->contraseña_nueva);
            $usuario->role_id=Role::CLIENTE;
            $usuario->save();

            return redirect()->back()->with('mensaje','Cargado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function update($id){
        $familiar = Cliente::findOrFail($id);
        return view('family.update')
        ->with('cliente', $familiar);
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
            'email' => 'required',
            'plan' => 'required',
            'contraseña'=> 'required',
            'contraseña_nueva'=> 'required',
            'id_titular'=> 'required'
        ]);
        try {
            $familiar = Cliente::findOrFail($request->id);
            $user = User::where('email', $familiar->email);
            if(password_verify($request->contraseña, $familiar->password)){
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
                $familiar->password=Hash::make($request->contraseña_nueva);
                $familiar->role_id=Role::CLIENTE;
                $familiar->save();

                $user->nombre= $request->nombre;
                $user->apellido= $request->apellido;
                $user->email= $request->email;
                $user->password=Hash::make($request->contraseña_nueva);
            }
            else{
                return redirect()->back()->with('error','La contraseña actual no coincide');
            }
            return redirect()->route('welcome')->with('mensaje','Cargado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
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
        return redirect()->route('welcome');
    }

    public function update_plan($id){
        $familiar = Cliente::findOrFail($id);
        $urlBack = url()->previous();
        $planes = Plan::all();
        return view('family.update-plan')
        ->with('familiar', $familiar)
        ->with('planes', $planes)
        ->with('urlBack', $urlBack);
    }

    public function patch_plan(Request $request)
    {
        $request->validate([
            'plan'=> 'required'
        ]);
        try {
            $familiar = Cliente::findOrFail($request->id);
            $familiar->plan_id= $request->plan;
            $familiar->save();
            return redirect()->route('family.list',['id_titular' => $familiar ->id_titular])->with('mensaje','Actualizado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
