<?php

namespace App\Http\Controllers;

use App\Models\Prestacion;
use Exception;
use Illuminate\Http\Request;


class BenefitController extends Controller
{

    public function show(){
        $prestaciones = Prestacion::all();
        return view('benefits.show')->with('prestaciones', $prestaciones);
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
            return redirect()->route('benefits.show');
        } catch (Exception $e) {
            echo($e);
            printf($e);
        }
    }

    public function delete($id_benefit)
    {
        $benefit = Prestacion::findOrFail($id_benefit);
        $benefit->destroy($benefit->id);
        $benefit->save();

        return redirect()->route('benefits.show');
    }
}