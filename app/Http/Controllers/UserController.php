<?php

namespace App\Http\Controllers;

use App\Models\Intervalo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::with('jugador')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$validated = $request->validate([
           'nombre'=>'required',
            'apellidos'=>'required',
            'telefono'=>'digits',
            'email'=>'required|email',
            'password'=>'required'
        ]);*/

        $user= new User();
        $user->nombre=$request['nombre'];
        $user->apellidos=$request['apellidos'];
        $user->telefono=$request['telefono'];
        $user->email=$request['email'];
        $user->password = $request['password'];

        $user->save();

        $respuesta = [
            "mensaje"=>'Usuario creado correctamente',
            "usuario"=>$user
        ];

        return response($respuesta);
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return User::with('jugador','intervalos')->find($user->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        /*$validated = $request->validate([
            'nombre'=>'required',
            'apellidos'=>'required',
            'telefono'=>'digits|minDigits:9|maxDigits:9',
            'email'=>'email|unique:users',
            'password'=>'min:6|'
        ]);*/

        $user->nombre=$request['nombre'];
        $user->apellidos=$request['apellidos'];
        $user->telefono=$request['telefono'];
        $user->email=$request['email'];
        $user->password = $request['password'];

        $user->save();

        $respuesta = [
            "mensaje"=>'Usuario modificado correctamente',
            "usuario"=>$user
        ];

        return response($respuesta);
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
