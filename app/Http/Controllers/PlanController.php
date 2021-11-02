<?php

namespace App\Http\Controllers;

use App\Models\Prestacion;
use App\Models\Plan;
use App\Models\Cliente;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PlanController extends Controller
{
    public function getAll(){
        $planes=Plan::all();
        $eliminar = [];
        foreach ($planes as $plan) {
            $clients = Cliente::where('plan_id', $plan->id)->get();
            $eliminar[$plan->id] = count($clients) === 0;
        }
        return view('plan.show')
        ->with('planes',$planes)
        ->with('eliminar', $eliminar);
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
        return redirect()->back()->with('mensaje','Cargado exitosamente');
    }   catch (Exception $e) {
        return redirect()->back()->with('error',$e->getMessage());
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
        try{
        $plan = Plan::findOrFail($request->id);
        $plan->nombre=$request->nombre;
        $plan->tipo=$request->tipo;
        $plan->costo=$request->costo;
        $plan->edad_desde=$request->edad_desde;
        $plan->edad_hasta=$request->edad_hasta;
        $plan->save();
        $prestacion = Prestacion::find($request->prestaciones);
        $plan->prestacion()->sync($prestacion);
        return redirect()->back()->with('mensaje','Cargado exitosamente');
    } catch (Exception $e) {
        return redirect()->back()->with('error',$e->getMessage());
    }
    }

    function delete($id) {
        $plan = Plan::findOrFail($id);
        $plan->destroy($plan->id);
        $plan->save();

        return redirect()->route('plan.show');
    }
}
