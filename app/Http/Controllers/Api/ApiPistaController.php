<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pista;
use Database\Seeders\PistaSeeder;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class ApiPistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->intervalo==="true"){
            $pistas=Pista::with('intervalos')->get();
            $pistas->intervalos=true;
        }else{
            $pistas = Pista::all();
        }

        return response($pistas,Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacion=Validator::make($request->all(),[
            'luz'=>'boolean',
            'tipoPista'=>Rule::in(['Individual', 'Dobles']),
            'cubierta' =>'boolean',
            'disponible'=>'boolean',
            'precioLuz'=> 'required_unless:luz,1|decimal:0,2'
        ]);

        if($validacion->fails()){
            return response('No se ha podido almacenar la pista',Response::HTTP_BAD_REQUEST);
        }else{
            if(!$request->luz and $request->precioLuz){
                return response('Petición incorrecta. No se puede definir el precio de la luz para una pista sin luz',Response::HTTP_BAD_REQUEST);
            }
            $pista = new Pista();
            $pista->luz=$request->luz;
            $pista->precioLuz=$request->precioLuz;
            $pista->cubierta=$request->cubierta;
            $pista->disponible=$request->disponible;
            $pista->tipoPista=$request->tipoPista;

        }
        return response($pista,Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  Pista  $pista
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pista $pista)
    {

        if($request->intervalos==="true"){
            $pistas=Pista::with('intervalos')->find($pista->id);
            $pistas->intervalos=true;
        }else{
            $pistas = Pista::find($pista->id);
        }

        return response($pistas,Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pista $pista )
    {
        $validacion=Validator::make($request->all(),[
            'luz'=>'boolean',
            'tipoPista'=>Rule::in(['Individual', 'Dobles']),
            'cubierta' =>'boolean',
            'disponible'=>'boolean',
            'precioLuz'=> 'required_if:luz,1|decimal:0,2'
        ]);

        if($validacion->fails()){
            return response("No se ha podido modificar la pista",Response::HTTP_NOT_MODIFIED);
        }else{

            if($request->luz)
                $pista->luz=$request->luz;
            if($request->precioLuz)
                $pista->precioLuz=$request->precioLuz;
            if($request->cubierta)
                $pista->cubierta=$request->cubierta;
            if($request->disponible)
                $pista->disponible=$request->disponible;
            if($request->tipoPista)
                $pista->tipoPista=$request->tipoPista;

            $pista->save();
            return response()->json([
                "mensaje"=>"Pista modificada",
                "pista"=>$pista
            ]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pista $pista)
    {
        try{
            $pista->deleteOrFail();
        } catch (\Throwable $e) {
            return response("Error al borrar la pista",Response::HTTP_NOT_MODIFIED);
        }
        return response()->json([
            "mensaje"=>"Pista borrada correctamente",
            "pista_borrada"=>$pista
        ]);
    }
}
