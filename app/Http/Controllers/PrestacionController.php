<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Plan;
use App\Models\Prestacion;
use App\Models\SolicitudPrestacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrestacionController extends Controller
{
    public function create()
    {
        $client = Cliente::where('email', Auth::user()->email)->get()[0];
        $plan = Plan::whereRaw('id = ' . $client->plan_id)->get()[0];
        $today = Carbon::now();
        return view('prestacion.create')->with('client', $client)->with('plan', $plan)->with('today', $today->toDateString());
    }

    public function store(Request $request)
    {
        $file = $request->file('autorizacion');
        $image = base64_encode(file_get_contents($file));
        $id = Cliente::where('email', Auth::user()->email)->get()[0]->id;
        DB::table('solicitud_prestaciones')->insert([
            'id_cliente' => $id,
            'image' => $image
        ]);
        return redirect()->route('welcome');
    }

    public function listSolicitudesPrestaciones()
    {
        $pendiente = 'PENDIENTE';
        $solicitudes = SolicitudPrestacion::orderBy('created_at', 'desc')->get();
        return view('prestacion.list')->with('solicitudes', $solicitudes);
    }

    public function update($id)
    {
        $solicitud = SolicitudPrestacion::findOrFail($id);

        
        $cliente = Cliente::findOrFail($id);
        $nombre_cliente = $cliente->nombre;

        return view('prestacion.update')
            ->with('solicitud', $solicitud)->with('nombre_cliente', $nombre_cliente);
    }

    public function patch($id, $estado)
    {
        $solicitud = SolicitudPrestacion::findOrFail($id);
        $solicitud->estado = $estado;
        $solicitud->save();

        return redirect()->route('prestaciones.list');
    }
}
