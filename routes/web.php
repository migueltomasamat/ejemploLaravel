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
    return view('index');
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

Route::get('/login', "RegisterController@createLogin");

Route::get('/register',"RegisterController@create");
Route::post('/login',"RegisterController@storeLogin");


Route::middleware('auth')->group(function(){

    Route::post('/register',[RegisterController::class,'store']);

    Route::get('/logout',[RegisterController::class,'destroyLogin']);
});




