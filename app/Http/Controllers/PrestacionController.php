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
        $nombre = Cliente::where('email', Auth::user()->email)->get()[0]->nombre;
        DB::table('solicitud_prestaciones')->insert([
            'nombre_cliente' => $nombre,
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
        return view('prestacion.update')
            ->with('solicitud', $solicitud);
    }

    public function patch($id, $estado)
    {
        $solicitud = SolicitudPrestacion::findOrFail($id);
        $solicitud->estado = $estado;
        $solicitud->save();

        return redirect()->route('prestaciones.list');
    }
}
