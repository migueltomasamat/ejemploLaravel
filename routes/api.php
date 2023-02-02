<?php

use App\Http\Controllers\Api\ApiJugadorController;
use App\Http\Controllers\Api\ApiRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiIntervaloController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/jugador',[ApiJugadorController::class,'index']);
Route::get('/jugador/{jugador}',[ApiJugadorController::class,'show']);
Route::post('/register',[ApiRegisterController::class,'store']);
Route::post('/login',[ApiRegisterController::class,'login']);



/*Podemos crear una ruta que permita recibir
parámetros en este caso si se desea que aparezcan los intervalos
con intervalos=true se muestran los intervalos con las pistas
*/
Route::get('/pista/{pista}',[\App\Http\Controllers\Api\ApiPistaController::class,'show']);
Route::get('/pista',[\App\Http\Controllers\Api\ApiPistaController::class,'index']);
Route::post('/register',[ApiRegisterController::class,'store']);
Route::post('/login',[ApiRegisterController::class,'login']);


Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('/jugador',[ApiJugadorController::class,'store']);
    Route::put('/jugador/{jugador}',[ApiJugadorController::class,'update']);
    Route::delete('/jugador/{jugador}',[ApiJugadorController::class,'destroy']);
    Route::post('/jugador/{jugador}/pareja/{pareja}',[ApiJugadorController::class,'attach']);
    Route::delete('jugador/{jugador}/pareja/{pareja}',[ApiJugadorController::class,'detach']);

    Route::post('/user',[\App\Http\Controllers\Api\APIUserController::class,'store']);

    Route::get('/user/{user}',[\App\Http\Controllers\Api\APIUserController::class,'show']);
    Route::put('/user/{user}',[\App\Http\Controllers\Api\APIUserController::class,'update']);
    Route::delete('/user/{user}',[\App\Http\Controllers\Api\APIUserController::class,'destroy']);
    Route::post('/user/{user}/intervalo',[\App\Http\Controllers\Api\APIUserController::class,'attach']);

    Route::post('/pista',[\App\Http\Controllers\Api\ApiPistaController::class,'store']);
    Route::put('/pista/{pista}',[\App\Http\Controllers\Api\ApiPistaController::class,'update']);
    Route::delete('/pista/{pista}',[\App\Http\Controllers\Api\ApiPistaController::class,'destroy']);

    Route::get('/logout',[ApiRegisterController::class,'logout']);



});








