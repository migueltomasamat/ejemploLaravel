<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intervalo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class APIUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(User::with('jugador')->get());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request,[
            'nombre'=>'required',
            'apellidos'=>'required',
            'telefono'=>'digits|maxDigits:9',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6'
        ]);

        if($validated->fails()){
            return response("No se ha podido almacenar el usuario",Response::HTTP_BAD_REQUEST);
        }else{
            $user= new User();
            $user->nombre=$request['nombre'];
            $user->apellidos=$request['apellidos'];
            if($request->telefono)
                $user->telefono=$request['telefono'];
            $user->email=$request['email'];
            $user->password = $request['password'];

            $user->save();

            $respuesta = [
                "mensaje"=>'Usuario creado correctamente',
                "usuario"=>$user
            ];

            return response()->json($respuesta);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response(User::with('jugador','intervalos')->find($user->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = Validator::make($request,[
            'telefono'=>'digits|maxDigits:9',
            'email'=>'email|unique:users',
            'password'=>'min:6'
        ]);

        if($validated->fails()){
            return response("No se ha podido almacenar el usuario",Response::HTTP_BAD_REQUEST);
        }else {
            if($request->nombre)
                $user->nombre = $request['nombre'];
            if($request->apellidos)
                $user->apellidos = $request['apellidos'];
            if($request->telefono)
                $user->telefono = $request['telefono'];
            if($request->email)
                $user->email = $request['email'];
            if($request->password)
                $user->password = $request['password'];

            $user->save();

            $respuesta = [
                "mensaje" => 'Usuario modificado correctamente',
                "usuario" => $user
            ];

            return response()->json($respuesta);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $respuesta =[
            "mensaje"=>"Usuario $user->id borrado correctamente",
            "usuario"=>$user
        ];
        $user->delete();
        return response($respuesta);

    }

    public function attach(Request $request, User $user){
        $intervalo = new Intervalo();
        $intervalo->fecha_hora_inicio=Carbon::createFromFormat('Y-m-d H:i:s',$request['fecha_hora_inicio']);
        $intervalo->fecha_hora_fin=Carbon::createFromFormat('Y-m-d H:i:s',$request['fecha_hora_fin']);
        $intervalo->user_id = $user->id;
        $intervalo->pista_id= $request['pista_id'];
        $intervalo->save();
        return response($user);
    }



    public function intervalos(User $user){
        $intervalos = $user->intervalos;
        return response($intervalos);
    }
}
