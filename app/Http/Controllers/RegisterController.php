<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest',['destroyLogin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'apellidos'=>'required',
            'telefono'=>'max:9',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

            $user= new User();
            $user->nombre=$request['nombre'];
            $user->apellidos=$request['apellidos'];
            $user->email=$request['email'];
            $user->telefono=$request['telefono'];
            $user->password=Hash::make($request['password']);

            $user->save();

            auth()->login($user,true);

            return redirect('/');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }

    public function createLogin(){
        return view('login');
    }

    public function storeLogin(Request $request){

        $credenciales=[
            'email'=>$request['email'],
            'password'=>$request['password']
        ];
        if(!Auth::attempt($credenciales)){
            return back()->withErrors(['mensaje'=>'No se ha podido logear']);
        }else{
            return redirect('/');
        }

    }
    public function destroyLogin(){
        Auth::logout();
        return redirect('/');
    }
}
