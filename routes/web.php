<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\listadoSalaController;
use App\Http\Controllers\descripcionSalaController;
use App\Http\Controllers\SalaAdminController;
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

// Inicio / Home

Route::get('/Usuario', [InicioController::class, 'Usuario']);

Route::get('/Admin', [InicioController::class, 'Admin']);

// Sala Usuario

Route::get('/Usuario/salas-de-conferencia',[SalaUsuarioController::class, 'getTipoSala']);

Route::get('/Usuario/salas-de-conferencia/{id}',[descripcionSalaController::class, 'getSala']);

// SALAS DE CONFERENCIA ADMIN

// Tipos Salas

Route::get('/Admin/salas-de-conferencia',[SalaAdminController::class, 'getTipoSala']);

Route::get('/Admin/salas-de-conferencia/tiposala/crear', [SalaAdminController::class, 'añadirTipoSala']);

Route::post('/Admin/salas-de-conferencia/tiposala/crear', [SalaAdminController::class, 'guardarTipoSala'])->name('tiposala.guardar');

Route::get('/Admin/salas-de-conferencia/tiposala/editar/{id}', [SalaAdminController::class, 'editarTipoSala']);

Route::put('/Admin/salas-de-conferencia/tiposala/editar/{id}', [SalaAdminController::class, 'actualizarTipoSala'])->name('tiposala.actualizar');

Route::delete('/Admin/salas-de-conferencia/tiposala/{id}', [SalaAdminController::class, 'deleteTipoSala']);

// Salas

Route::get('/Admin/salas-de-conferencia/sala/editar/{id}', [SalaAdminController::class, 'editarSala']);

Route::put('/Admin/salas-de-conferencia/sala/editar/{id}', [SalaAdminController::class, 'actualizarSala'])->name('sala.actualizar');

Route::get('/Admin/salas-de-conferencia/sala/crear', [SalaAdminController::class, 'añadirSala']);

Route::post('/Admin/salas-de-conferencia/sala/crear', [SalaAdminController::class, 'guardarSala'])->name('sala.guardar');

Route::delete('/Admin/salas-de-conferencia/sala/{id}', [SalaAdminController::class, 'deleteSala']);

