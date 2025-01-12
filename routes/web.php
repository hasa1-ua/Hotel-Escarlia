<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\listadoSalaController;
use App\Http\Controllers\DescripcionSalaController;
use App\Http\Controllers\SalaAdminController;
use App\Http\Controllers\ExtrasUsuarioController;
use App\Http\Controllers\PerfilRecepcionistaController;
use App\Http\Controllers\PerfilUsuarioController;
use App\Http\Controllers\PerfilWebmasterController;
use App\Http\Controllers\SalaUsuarioController;
use App\Models\User;

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


//Esto es para poder tener una sesion mientras david termina lo suyo
Route::get('/simulate-login', function () {
    $user = User::find(2);
    if ($user) {
        auth()->login($user);
        return redirect('/Recepcionista');
    }
    return "Usuario no encontrado";
});

Route::get('/simulate-logout', function () {
    auth()->logout();
    return redirect('/Recepcionista');
});

Route::get('/', function () {
    return redirect('/Recepcionista');
});

// Inicio / Home

Route::get('/Usuario', [InicioController::class, 'Usuario']);

Route::get('/Usuario/salas-de-conferencia',[SalaUsuarioController::class, 'getTipoSala']);
Route::get('/Usuario/salas-de-conferencia/{id}',[DescripcionSalaController::class, 'getSala']);
Route::get('/Usuario/fotos', [ExtrasUsuarioController::class, 'getFotos']);

Route::get('/Usuario/perfil', [PerfilUsuarioController::class, 'mi_perfil']);
Route::get('/Usuario/perfil/editar-usuario', [PerfilUsuarioController::class, 'editar_perfil']);
Route::post('/Usuario/perfil/editar-usuario/{email}', [PerfilUsuarioController::class, 'confirmar_editar'])->name('perfil.confirmarEditar');
Route::get('/Usuario/perfil/modificar-contraseña', [PerfilUsuarioController::class, 'modificar_contraseña']);
Route::post('/Usuario/perfil/modificar-contraseña/{email}', [PerfilUsuarioController::class, 'confirmar_contraseña'])->name('perfil.confirmarContraseña');



Route::get('/Webmaster', [InicioController::class, 'Webmaster']);

Route::get('/Webmaster/perfil', [PerfilWebmasterController::class, 'mi_perfil']);
Route::get('/Webmaster/perfil/editar-usuario', [PerfilWebmasterController::class, 'editar_perfil']);
Route::post('/Webmaster/perfil/editar-usuario/{email}', [PerfilWebmasterController::class, 'confirmar_editar'])->name('perfil.confirmarEditar');
Route::get('/Webmaster/perfil/modificar-contraseña', [PerfilWebmasterController::class, 'modificar_contraseña']);
Route::post('/Webmaster/perfil/modificar-contraseña/{email}', [PerfilWebmasterController::class, 'confirmar_contraseña'])->name('perfil.confirmarContraseña');



Route::get('/Recepcionista', [InicioController::class, 'Recepcionista']);

Route::get('/Recepcionista/perfil', [PerfilRecepcionistaController::class, 'mi_perfil']);
Route::get('/Recepcionista/perfil/editar-usuario', [PerfilRecepcionistaController::class, 'editar_perfil']);
Route::post('/Recepcionista/perfil/editar-usuario/{email}', [PerfilRecepcionistaController::class, 'confirmar_editar'])->name('perfil.confirmarEditar');
Route::get('/Recepcionista/perfil/modificar-contraseña', [PerfilRecepcionistaController::class, 'modificar_contraseña']);
Route::post('/Recepcionista/perfil/modificar-contraseña/{email}', [PerfilRecepcionistaController::class, 'confirmar_contraseña'])->name('perfil.confirmarContraseña');



Route::get('/Publico', [InicioController::class, 'Publico']);

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

