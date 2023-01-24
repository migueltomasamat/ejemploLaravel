<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApiRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            $user = User::where('email','=',$request->email)->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                "mensaje" => "Usuario logeado correctamente",
                "token" => $token,
                "token_type" => 'Bearer'
            ]);
        }else{
            return \response()->json(['mensaje'=>'Usuario no permitido']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacion= Validator::make($request->all(),[
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users',
            'telefono' => 'max:9',
            'password' => 'required|min:6|confirmed'
        ]);

        if($validacion->fails()){
            return response()->json($validacion->errors());
        }else{
            $user = new User();
            $user->nombre = $request->nombre;
            $user->apellidos = $request->apellidos;
            $user->telefono = $request->telefono;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $token = $user->createToken('auth_token')->plainTextToken;



            return response()->json([
                "mensaje" => 'Usuario creado correctamente',
                "usuario" => $user,
                "token" => $token,
                "token_type" => 'Bearer'
            ]);
        }


    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json(["mensaje"=>"Sesion cerrada"]);
    }
}
