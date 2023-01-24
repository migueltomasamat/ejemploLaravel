<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\Api\ApiRegisterController;

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

Route::get('/jugador',[JugadorController::class,'index']);
Route::get('/jugador/{jugador}',[JugadorController::class,'show']);
Route::post('/register',[ApiRegisterController::class,'store']);
Route::post('/login',[ApiRegisterController::class,'login']);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('/jugador',[JugadorController::class,'store']);
    Route::put('/jugador/{jugador}',[JugadorController::class,'update']);
    Route::delete('/jugador/{jugador}',[JugadorController::class,'destroy']);
    Route::post('/jugador/{jugador}/pareja/{pareja}',[JugadorController::class,'attach']);
    Route::delete('jugador/{jugador}/pareja/{pareja}',[JugadorController::class,'detach']);

    Route::post('/user',[\App\Http\Controllers\UserController::class,'store']);
    Route::get('/user',[\App\Http\Controllers\UserController::class,'index']);
    Route::get('/user/{user}',[\App\Http\Controllers\UserController::class,'show']);
    Route::put('/user/{user}',[\App\Http\Controllers\UserController::class,'update']);
    Route::delete('/user/{user}',[\App\Http\Controllers\UserController::class,'destroy']);
    Route::post('/user/{user}/intervalo',[\App\Http\Controllers\UserController::class,'attach']);
    Route::get('/user/{user}/intervalo',[\App\Http\Controllers\UserController::class,'intervalos']);

    Route::get('/logout',[ApiRegisterController::class,'logout']);



});








