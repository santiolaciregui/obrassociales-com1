<?php

namespace App\Http\Controllers;

use App\Models\Prestacion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BenefitController extends Controller
{

    public function show(){
        $prestaciones = Prestacion::all();
        $show = [];
        foreach ($prestaciones as $prestacion) {
            $plans = DB::table("plan_prestacion")->select("*")->where('prestacion_id', $prestacion->id)->get();
            $show[$prestacion->nombre] = count($plans) === 0;
        }
        return view('benefits.show')->with('prestaciones', $prestaciones)->with('show', $show);
    }

    public function create(){
        return view('benefits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'required'

        ]);
        try {
            $benefit = new Prestacion ();
            $benefit->nombre= $request->nombre;
            $benefit->save();
            return redirect()->route('benefits.show')->with('mensaje','Cargado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function delete($id_benefit)
    {
        $benefit = Prestacion::findOrFail($id_benefit);
        $benefit->destroy($benefit->id);
        $benefit->save();

        return redirect()->route('benefits.show')->with('mensaje','Eliminado exitosamente');
    }
}
