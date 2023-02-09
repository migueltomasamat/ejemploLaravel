<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pareja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Jugador;

class ApiParejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response (Pareja::with('jugadors')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valido=Validator::make($request->all(), [
            "nombre"=>"required",
                "jugadors"=>"array" //Solamente aceptamos arrays con etiquetas jugador1_id y jugador2_id
            ]
        );

        if($valido){
            $pareja = new Pareja();
            $pareja->nombre = $request->nombre;
            $pareja->save();
            foreach ($request->jugadors as $jugador_id){
                $pareja->jugadors()->attach($jugador_id);
            }


            return $this->show($pareja);

        }else{
            return response("Problema al validar tu peticion",Response::HTTP_BAD_REQUEST);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pareja  $pareja
     * @return \Illuminate\Http\Response
     */
    public function show(Pareja $pareja)
    {
        return response(Pareja::with('jugadors')->find($pareja->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pareja  $pareja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pareja $pareja)
    {
        $valido=Validator::make($request->all(), [
                "nombre"=>"required",
                "jugadors"=>"array" //Solamente aceptamos arrays con etiquetas jugador1_id y jugador2_id
            ]
        );
        if ($valido->fails()){
            return response("No se ha podido actualizar",Response::HTTP_BAD_REQUEST);
        }else{
            if(isset($request->nombre)){
                $pareja->nombre=$request->nombre;
            }
            if(isset($request->jugadors)){
                $this->borrarJugadors($pareja);
                foreach ($request->jugadors as $jugadors_id){
                    $pareja->jugadors()->attach($jugadors_id);
                }
            }
            $pareja->save();

            return response('Pareja actualizada correctamente');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pareja  $pareja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pareja $pareja)
    {
        $respuesta = [
            "mensaje"=>"Pareja borrada correctamente",
            "pareja_borrada"=>$pareja
        ];
        return response()->json($respuesta,Response::HTTP_OK);
    }

    public function attach(Pareja $pareja,Jugador $jugador){
        $pareja->jugadors()->detach($jugador);

        return response("jugador añadido correctamente");
    }

    public function detach(Pareja $pareja, Jugador $jugador){
        $pareja->jugadors()->detach($jugador->id);
        return response("jugador borrado correctamente");
    }

    public function borrarJugadors(Pareja $pareja){
        foreach ($pareja->jugadors()->get() as $jugador) {
            $this->detach($pareja,$jugador);
        }
    }
}
