<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intervalo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\ReservaMailController;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ApiIntervaloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Intervalo::with(['user','pista'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $intervalo= new Intervalo;
        $intervalo->fecha_hora_inicio = Carbon::parse($request->fecha_hora_inicio);
        $intervalo->fecha_hora_fin = Carbon::parse($request->fecha_hora_fin);
        $intervalo->user_id = $request->user_id;
        $intervalo->pista_id = $request->pista_id;

        $intervalo->save();

        Mail::to([$intervalo->user->email])->send(new ReservaMailController($intervalo));

        return response([
            "mensaje"=>"Intervalo almacenado correctamente",
            "intervalo"=>Intervalo::with('user')->find($intervalo->id)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Intervalo  $intervalo
     * @return \Illuminate\Http\Response
     */
    public function show(Intervalo $intervalo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Intervalo  $intervalo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intervalo $intervalo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Intervalo  $intervalo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intervalo $intervalo)
    {
        //
    }
}
