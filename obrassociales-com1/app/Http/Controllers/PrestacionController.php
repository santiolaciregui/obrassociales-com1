<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrestacionController extends Controller
{
    public function create() {
        $client = Cliente::where('email', Auth::user()->email)->get()[0];
        $plan = Plan::whereRaw('id = '. $client->plan_id)->get()[0];
        $today = Carbon::now();
        return view('prestacion.create')->with('client',$client)->with('plan', $plan)->with('today', $today->toDateString());
    }

    public function store(Request $request) {
        $file = $request->file('autorizacion');
        $image = base64_encode(file_get_contents($file));
        $id_cliente = Cliente::where('email', Auth::user()->email)->get()[0]->id;
        DB::table('solicitud_prestaciones')->insert([
            'id_cliente' => $id_cliente,
            'image' => $image
        ]);
        return redirect('/prestacion/create');
    }
}
