<?php

namespace App\Http\Controllers;

use App\Models\Pista;
use Illuminate\Http\Request;

class PistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->crearPistas();
        $pistas = Pista::all();
        return view("pistas.index",['pistas'=>$pistas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pistas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'luz'=>'required|boolean',
           'tipoPista'=>Rule::in(['Individual', 'Dobles']),
            'cubierta' =>'required|boolean',
           'disponible'=>'required|boolean',
           'precio'=> 'required|decimal:0,2'
       ]);

       Pista::create($request['luz'],$request['tipoPista'],
           $request['cubierta'],$request['disponible'],$request['precio']);

       return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pista  $pista
     * @return \Illuminate\Http\Response
     */
    public function show(Pista $pista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pista  $pista
     * @return \Illuminate\Http\Response
     */
    public function edit(Pista $pista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pista  $pista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pista $pista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pista  $pista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pista $pista)
    {
        //
    }

    public function crearPistas(){
        $pista = new Pista();

        $pista->luz=true;
        $pista->precioLuz=4.5;
        $pista->tipoPista='Individual';

        $pista->save();

        $pista->luz=true;
        $pista->precioLuz=9;
        $pista->tipoPista='Dobles';

        $pista->save();
    }
}
