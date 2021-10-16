<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\CuponDePago;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class CuponDePagoController extends Controller
{
    const formas = [1 => 'Mensual', 2 => 'Semestral', 3 => 'Anual'];
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
        return view('cupon.create')->with('formas', self::formas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('cupon-download/'.$request->get('formaDePago'));
    }

    function cost($plan) {
        return 1000;
    }

    function downloadPDF() {
        $client = Cliente::where('email', 'rodrigo@delaserna.com')->get()[0];
        $related = Cliente::where('id_titular', $client->id)->get();

        $costs = [];

        foreach ($related as $f) {
            $cost = $this->cost($f->plan_id);
            $costs[$f->nombre. " " .$f->apellido] = $cost;
        }

        $pdf = PDF::loadView('pdfview', ['costos' => $costs, 'codigo' => rand(100000, 1000000000)]);
        return $pdf->download('cupon de cobro.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CuponDePago  $cuponDePago
     * @return \Illuminate\Http\Response
     */
    public function show(CuponDePago $cuponDePago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CuponDePago  $cuponDePago
     * @return \Illuminate\Http\Response
     */
    public function edit(CuponDePago $cuponDePago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CuponDePago  $cuponDePago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CuponDePago $cuponDePago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CuponDePago  $cuponDePago
     * @return \Illuminate\Http\Response
     */
    public function destroy(CuponDePago $cuponDePago)
    {
        //
    }
}
