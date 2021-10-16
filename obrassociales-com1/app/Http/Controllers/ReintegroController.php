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
        $client = Cliente::where('email', 'rodrigo@delaserna.com')->get()[0];
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
        dd($request);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reintegro  $reintegro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reintegro $reintegro)
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
