<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Prestacion;
use Exception;
use Illuminate\Http\Request;


class PlanController extends Controller
{
    public function getAll(){
        $planes=Plan::all();
        return view('plan.show')
        ->with('planes',$planes);
    }

   
    public function create(){
        $admin=auth()->user();
        $prestaciones=Prestacion::all();
        return view('plan.create')
        ->with("prestaciones", $prestaciones);
    }

    public function store(Request $request){
        $request->validate([
            'nombre'=> 'required',
            'tipo'=> 'required',
            'costo'=> 'required',
            'edad_desde'=> 'required',
            'edad_hasta'=> 'required',
            'beneficiario'=> 'required',
        ]);
       try{
        $plan = new Plan ();
        $plan->nombre=$request->nombre;
        $plan->tipo=$request->tipo;
        $plan->costo=$request->costo;
        $plan->edad_desde=$request->edad_desde;
        $plan->edad_hasta=$request->edad_hasta;
        $plan->beneficiario=$request->beneficiario;
        $plan->save();
        $prestacion = Prestacion::find($request->prestaciones);
        $plan->prestacion()->sync($prestacion);
        return redirect()->route('welcome');
    } catch (Exception $e){
        echo($e);
        printf($e);
        return redirect()->back();
    }
    }

    public function update($id){
        $plan = Plan::findOrFail($id);
        $prestaciones=Prestacion::all();
        $urlBack = url()->previous();
        return view('plan.update')
        ->with('plan',$plan)
        ->with('urlBack',$urlBack)
        ->with("prestaciones", $prestaciones);;
    }

    public function get($id){
        $plan=Plan::findOrFail($id);
        return view('plan.show')
        ->with('plan',$plan);
    }


    public function patch (Request $request){
        $request->validate([
            'nombre'=> 'required',
            'tipo'=> 'required',
            'costo'=> 'required',
            'edad_desde'=> 'required',
            'edad_hasta'=> 'required',
            'beneficiario'=> 'required',
        ]);
        $plan = Plan::findOrFail($request->id);
        $plan->nombre=$request->nombre;
        $plan->tipo=$request->tipo;
        $plan->costo=$request->costo;
        $plan->edad_desde=$request->edad_desde;
        $plan->edad_hasta=$request->edad_hasta;
        $plan->save();
        $prestacion = Prestacion::find($request->prestaciones);
        $plan->prestacion()->sync($prestacion);
        return redirect()->route('welcome');
    }


}
