<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Plan;
use App\Models\Prestacion;
use App\Models\SolicitudPrestacion;
use Carbon\Carbon;
use Exception;
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
       try {
            if ($request->hasFile('autorizacion')) {
                $file = $request->file('autorizacion');
                $image = base64_encode(file_get_contents($file));
                $id = Cliente::where('email', Auth::user()->email)->get()[0]->id;
                $solicitud = new SolicitudPrestacion();
                $solicitud -> id_cliente = $id;
                $solicitud -> image = $image;
                $solicitud -> estado = 'PENDIENTE';
                $solicitud->save();

                return redirect()->route('welcome')->with('mensaje','Cargado exitosamente');
            } else {
                return redirect()->back()->with('error', 'No se selecciono una imagen');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function listSolicitudesPrestaciones()
    {
        $solicitudes = SolicitudPrestacion::orderBy('created_at', 'desc')->get();
        $res = [];
        foreach ($solicitudes as $solicitud) {
            $client = Cliente::findOrFail($solicitud->id_cliente);
            if ($client) {
                if (!array_key_exists($client->nombre . " " . $client->apellido, $res))
                    $res[$client->nombre. " " .$client->apellido] = [$solicitud];
                else
                    array_push($res[$client->nombre . " " . $client->apellido], $solicitud);
            }
        }
        return view('prestacion.list')->with('solicitudes', $res);
    }

    public function update($id)
    {
        $solicitud = SolicitudPrestacion::findOrFail($id);
        $cliente = Cliente::findOrFail($solicitud->id_cliente);
        $nombre_cliente = $cliente->nombre;

        return view('prestacion.update')
            ->with('solicitud', $solicitud) -> with('nombre_cliente', $nombre_cliente);
    }

    public function patch($id, $estado)
    {
        try{
        $solicitud = SolicitudPrestacion::findOrFail($id);
        $solicitud->estado = $estado;
        $solicitud->save();

        return redirect()->route('prestaciones.list')->with('mensaje','Actualizado exitosamente');

    } catch (Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
    }
}
