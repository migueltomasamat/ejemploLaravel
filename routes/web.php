<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\IntervaloController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/partida', [\App\Http\Controllers\PartidaController::class,'index']);


//Petición get de todas las pistas
Route::get('/pista', "PistaController@index");
Route::get('/pista/{pista}', "PistaController@show");

Route::post('/pista', "PistaController@store")->name('guardarPista');
Route::put('/pista/{pista}', "PistaController@update");
Route::patch('/pista/{pista}', "PistaController@update");
Route::delete('/pista/{pista}', "PistaController@destroy");

Route::get('/intervalo/{intervalo}',[IntervaloController::class,'index']);



Route::get('/crear-pista', "PistaController@create");
Route::get('/modificar-pista/{pista}', "PistaController@edit");

Route::get('/login', "RegisterController@createLogin");

Route::get('/register',"RegisterController@create");
Route::post('/login',"RegisterController@storeLogin");
Route::get('/crear-partida',"PartidaController@create");


Route::middleware('auth')->group(function(){

    Route::get('/user',[\App\Http\Controllers\UserController::class,"show"])->name('datosUsuario');
    Route::delete('/user/{user}',[\App\Http\Controllers\UserController::class,"destroy"]);
    Route::get('/edit-user',[\App\Http\Controllers\UserController::class,"edit"]);
    Route::put('/user/{user}',[\App\Http\Controllers\UserController::class,"update"]);

    Route::post('/register',[RegisterController::class,'store']);

    Route::get('/logout',[RegisterController::class,'destroyLogin']);
});




