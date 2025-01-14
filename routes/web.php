<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DescripcionSalaController;
use App\Http\Controllers\SalaWebmasterController;
use App\Http\Controllers\ExtrasUsuarioController;
use App\Http\Controllers\PerfilRecepcionistaController;
use App\Http\Controllers\PerfilUsuarioController;
use App\Http\Controllers\PerfilWebmasterController;
use App\Http\Controllers\SalaUsuarioController;
use App\Http\Controllers\ReservaWebmasterController;
use App\Http\Controllers\UsuarioWebmasterController;
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
    $user = User::find(1);
    if ($user) {
        auth()->login($user);
        return redirect('/Usuario');
    }
    return "Usuario no encontrado";
});

Route::get('/simulate-logout', function () {
    auth()->logout();
    return redirect('/Usuario');
});

Route::get('/', function () {
    return redirect('/Usuario');
});

// Inicio / Home

Route::get('/Usuario', [InicioController::class, 'Usuario']);

Route::get('/Usuario/salas-de-conferencia',[SalaUsuarioController::class, 'getTipoSala']);
Route::get('/Usuario/salas-de-conferencia/{id}',[DescripcionSalaController::class, 'getSalaUsuario']);
Route::get('/Usuario/fotos', [ExtrasUsuarioController::class, 'getFotos']);

Route::get('/Usuario/perfil', [PerfilUsuarioController::class, 'mi_perfil']);
Route::get('/Usuario/perfil/editar-usuario', [PerfilUsuarioController::class, 'editar_perfil']);
Route::post('/Usuario/perfil/editar-usuario/{email}', [PerfilUsuarioController::class, 'confirmar_editar'])->name('perfil.confirmarEditar');
Route::get('/Usuario/perfil/modificar-contraseña', [PerfilUsuarioController::class, 'modificar_contraseña']);
Route::post('/Usuario/perfil/modificar-contraseña/{email}', [PerfilUsuarioController::class, 'confirmar_contraseña'])->name('perfil.confirmarContraseña');



Route::get('/Webmaster', [InicioController::class, 'Webmaster']);

Route::get('/Webmaster/salas-de-conferencia',[SalaWebmasterController::class, 'getTipoSala']);
Route::get('/Webmaster/salas-de-conferencia/tiposala/crear', [SalaWebmasterController::class, 'añadirTipoSala']);
Route::post('/Webmaster/salas-de-conferencia/tiposala/crear', [SalaWebmasterController::class, 'guardarTipoSala'])->name('tiposala.guardar');
Route::get('/Webmaster/salas-de-conferencia/tiposala/editar/{id}', [SalaWebmasterController::class, 'editarTipoSala']);
Route::put('/Webmaster/salas-de-conferencia/tiposala/editar/{id}', [SalaWebmasterController::class, 'actualizarTipoSala'])->name('tiposala.actualizar');
Route::delete('/Webmaster/salas-de-conferencia/tiposala/{id}', [SalaWebmasterController::class, 'deleteTipoSala']);

Route::get('/Webmaster/salas-de-conferencia/sala/editar/{id}', [SalaWebmasterController::class, 'editarSala']);
Route::put('/Webmaster/salas-de-conferencia/sala/editar/{id}', [SalaWebmasterController::class, 'actualizarSala'])->name('sala.actualizar');
Route::get('/Webmaster/salas-de-conferencia/sala/crear', [SalaWebmasterController::class, 'añadirSala']);
Route::post('/Webmaster/salas-de-conferencia/sala/crear', [SalaWebmasterController::class, 'guardarSala'])->name('sala.guardar');
Route::delete('/Webmaster/salas-de-conferencia/sala/{id}', [SalaWebmasterController::class, 'deleteSala']);
Route::delete('/Webmaster/salas-de-conferencia/sala/editar/{id}', [SalaWebmasterController::class, 'deleteImagen'])->name('sala.eliminarImagen');

Route::get('/Webmaster/reservas',[ReservaWebmasterController::class, 'getReserva']);
Route::get('/Webmaster/reservas/editar/{id}', [ReservaWebmasterController::class, 'editarReserva']);
Route::put('/Webmaster/reservas/editar/{id}', [ReservaWebmasterController::class, 'actualizarReserva'])->name('reservas.actualizar');
Route::delete('/Webmaster/reservas/{id}', [ReservaWebmasterController::class, 'deleteReserva']);
Route::get('/Webmaster/reservas/crear', [ReservaWebmasterController::class, 'añadirReserva']);
Route::post('/Webmaster/reservas/crear', [ReservaWebmasterController::class, 'guardarReserva'])->name('reservas.guardar');

Route::get('/Webmaster/usuarios',[UsuarioWebmasterController::class, 'getUsuarios']);


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