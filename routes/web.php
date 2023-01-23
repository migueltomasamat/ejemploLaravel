<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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
    $nombre='Carlos';
    $apellidos='Martinez';
    $opciones=['tiempo'=>25,'carga'=>'lazy'];

    return view('index',compact('nombre','apellidos','opciones'));
})->name('home');

//Petición get de todas las pistas
Route::get('/pista', "PistaController@index");
Route::get('/pista/{pista}', "PistaController@show");

Route::post('/pista', "PistaController@store")->name('guardarPista');
Route::put('/pista/{pista}', "PistaController@update");
Route::patch('/pista/{pista}', "PistaController@update");
Route::delete('/pista/{pista}', "PistaController@destroy");




Route::get('/crear-pista', "PistaController@create");
Route::get('/modificar-pista/{pista}', "PistaController@edit");

Route::get('/login', "SesionController@index");
Route::get('/register',"RegisterController@create");
Route::post('/register',[RegisterController::class,'store']);



