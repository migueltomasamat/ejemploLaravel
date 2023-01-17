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
        return Pista::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
