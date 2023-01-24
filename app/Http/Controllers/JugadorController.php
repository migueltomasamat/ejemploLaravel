<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Pareja;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores=Jugador::with('user','parejas')->get();
        return response($jugadores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jugador= Jugador::create([
           'nivelJuego'=>$request['nivelJuego'],
           'manoHabil'=>$request['manoHabil'],
            'ladoPreferido'=>$request['ladoPreferido'],
            'indiceResponsabilidad'=>$request['indiceResponsabilidad'],
            'numFederado'=>$request['numFederado'],
            'renovacionAutomatica'=>$request['renovacionAutomatica'],
            'partidasMixtas'=>$request['partidasMixtas'],
            'user_id'=>$request['user_id']
        ]);

        if (!$jugador){
            return response('Imposible crear usuario',500);
        }else{
            $respuesta=[
                'mensaje'=>'Jugador creado correctamente',
                'datos almacenados'=>$jugador
            ];
            return response($respuesta,Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function show(Jugador $jugador)
    {
        if($jugador!==null){

            $jugador=Jugador::with('user','parejas')->find($jugador->id);
            return response($jugador);
        }
        else{
            return response("Imposible mostrar el recurso",);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jugador $jugador)
    {
        $jugador->nivelJuego=$request['nivelJuego'];
        $jugador->manoHabil=$request['manoHabil'];
        $jugador->ladoPreferido=$request['ladoPreferido'];
        $jugador->indiceResponsabilidad=$request['indiceResponsabilidad'];
        $jugador->numFederado=$request['numFederado'];
        $jugador->renovacionAutomatica=$request['renovacionAutomatica'];
        $jugador->partidasMixtas=$request['partidasMixtas'];
        $jugador->user_id=$request['user_id'];

        try{
            $jugador->saveOrFail();
        }catch (\Throwable $e) {
            return response("Imposible actualizar el jugador",304);
        }
        $respuesta=[
            'mensaje'=>'Jugador actualizado correctamente',
            'jugador'=>$jugador
        ];
        return response($respuesta,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jugador $jugador)
    {
        try{
            $jugador->deleteOrFail();
        } catch (\Throwable $e) {
            return response('Imposible borrar el jugador',304);
        }
        $respuesta=[
            'mensaje'=>'Jugador borrado correctamente',
            'jugador'=>$jugador
        ];
        return response($respuesta,200);

    }

    public function attach(Request $request, Jugador $jugador,Pareja $pareja){
        $jugador->parejas()->attach($pareja);
        return response($pareja);
    }

    public function detach(Request $request, Jugador $jugador, Pareja $pareja){
        $jugador->parejas()->detach($pareja);
        return response(Pareja::find($pareja->id));
    }
}
