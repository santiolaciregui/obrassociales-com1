<?php

namespace App\Http\Controllers;

use App\Models\Reintegro;
use App\Models\Cliente;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReintegroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Cliente::where('email', Auth::user()->email)->get()[0];
        $plan = Plan::whereRaw('id ='. $client->plan_id)->get()[0];
        $today = Carbon::now();
        return view('reintegro.create')->with('client', $client)->with('plan', $plan)->with('today', $today->toDateString());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'comprobante'=> 'required',
            'fecha_emision'=> 'required',
            'profesional'=> 'required',
            'importe'=> 'required'
        ]);

        $cliente = Cliente::where('email', Auth::user()->email)->get()[0];
        $reintegro = new Reintegro();
        $reintegro->id_cliente = $cliente->id;
        $reintegro->fecha_solicitud = date(Carbon::now()->format('Y-m-d'));
        $reintegro->comprobante_factura = $request->comprobante;
        $reintegro->fecha_emision = date(Carbon::parse($request->fecha_emision)->format('Y-m-d'));
        $reintegro->nombre_profesional = $request->profesional;
        $reintegro->importe_facturado = $request->importe;
        $reintegro->save();

        return redirect()->route('welcome');
    }


    public function listReintegros() {
        $reintegros = Reintegro::orderBy('fecha_solicitud','desc')->get();;
        $res = [];
        foreach ($reintegros as $reintegro) {
            $client = Cliente::findOrFail($reintegro->id_cliente);
            if ($client) {
                if (!array_key_exists($client->nombre . " " . $client->apellido, $res))
                    $res[$client->nombre . " " . $client->apellido] = [$reintegro];
                else
                    array_push($res[$client->nombre . " " . $client->apellido], $reintegro);
            }
        }
        return view('reintegro.list')->with('reintegros', $res);
    }

    public function update($id)
    {
        $solicitud = Reintegro::findOrFail($id);

        $cliente = Cliente::findOrFail($id);
        $nombre_cliente = $cliente->nombre;

        return view('reintegro.update')
            ->with('solicitud', $solicitud)->with('nombre_cliente', $nombre_cliente);
    }

    public function patch($id, $estado)
    {
        $solicitud = Reintegro::findOrFail($id);
        $solicitud->estado = $estado;
        $solicitud->save();

        return redirect()->route('reintegros.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reintegro  $reintegro
     * @return \Illuminate\Http\Response
     */
    public function show(Reintegro $reintegro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reintegro  $reintegro
     * @return \Illuminate\Http\Response
     */
    public function edit(Reintegro $reintegro)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reintegro  $reintegro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reintegro $reintegro)
    {
        //
    }
}
