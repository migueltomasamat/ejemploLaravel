<?php

namespace App\Http\Controllers;

use App\Models\Pista;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        //var_dump($request);
       $this->validate($request,[
           'luz'=>'boolean',
           'tipoPista'=>Rule::in(['Individual', 'Dobles']),
            'cubierta' =>'boolean',
           'disponible'=>'boolean',
           'precioLuz'=> 'required|decimal:0,2'
       ]);


       $pista=Pista::create([
           'luz'=>$request['luz'] ?? 0,
           'tipoPista'=>$request['tipoPista'],
           'cubierta'=>$request['cubierta'] ?? 0,
           'disponible'=>$request['disponible'] ?? 0,
           'precioLuz'=>$request['precioLuz']
       ]);
        if ($pista){
            return redirect('/pista');
        }else{
            return back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pista  $pista
     * @return \Illuminate\Http\Response
     */
    public function show(Pista $pista)
    {
        echo "La pista: ".$pista->id;
        return view('pistas.show',compact('pista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pista  $pista
     * @return \Illuminate\Http\Response
     */
    public function edit(Pista $pista)
    {
        return view('pistas.edit',compact('pista'));
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
        $this->validate($request,[
            'luz'=>'boolean',
            'tipoPista'=>Rule::in(['Individual', 'Dobles']),
            'cubierta' =>'boolean',
            'disponible'=>'boolean',
            'precioLuz'=> 'required|decimal:0,2'
        ]);
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
