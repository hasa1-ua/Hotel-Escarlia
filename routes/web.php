<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\listadoSalaController;
use App\Http\Controllers\descripcionSalaController;
use App\Http\Controllers\SalaUsuarioController;

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
    return redirect('/Usuario');
});

Route::get('/Usuario', [InicioController::class, 'Usuario']);

Route::get('/Admin', [InicioController::class, 'Admin']);

Route::get('/Usuario/salas-de-conferencia',[SalaUsuarioController::class, 'getTipoSala']);
//En salas hay que pasarle atributos de TipoSala
Route::get('/Usuario/salas-de-conferencia/{id}',[descripcionSalaController::class, 'getSala']);
