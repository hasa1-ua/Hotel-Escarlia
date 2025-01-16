<?php

use App\Http\Controllers\DescripcionHabitacionesController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DescripcionSalaController;
use App\Http\Controllers\SalaWebmasterController;
use App\Http\Controllers\ExtrasUsuarioController;
use App\Http\Controllers\HabitacionesRecepcionistaController;
use App\Http\Controllers\HabitacionesUsuarioController;
use App\Http\Controllers\PerfilRecepcionistaController;
use App\Http\Controllers\PerfilUsuarioController;
use App\Http\Controllers\PerfilWebmasterController;
use App\Http\Controllers\SalaRecepcionistaController;
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
    $user = User::find(1);
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



Route::get('/Usuario', [InicioController::class, 'Usuario']);

Route::get('/Usuario/salas-de-conferencia',[SalaUsuarioController::class, 'getTipoSala']);
Route::get('/Usuario/salas-de-conferencia/{id}',[DescripcionSalaController::class, 'getSalaUsuario']);

Route::get('/Usuario/habitaciones',[HabitacionesUsuarioController::class, 'getTipoHabitacion']);
Route::get('/Usuario/habitaciones/{id}',[DescripcionHabitacionesController::class, 'getHabitacionesUsuario']);

Route::get('/Usuario/fotos', [ExtrasUsuarioController::class, 'getFotos']);

Route::get('/Usuario/perfil', [PerfilUsuarioController::class, 'mi_perfil']);
Route::get('/Usuario/perfil/editar-usuario', [PerfilUsuarioController::class, 'editar_perfil']);
Route::post('/Usuario/perfil/editar-usuario/{email}', [PerfilUsuarioController::class, 'confirmar_editar']);
Route::get('/Usuario/perfil/modificar-contraseña', [PerfilUsuarioController::class, 'modificar_contraseña']);
Route::post('/Usuario/perfil/modificar-contraseña/{email}', [PerfilUsuarioController::class, 'confirmar_contraseña']);



Route::get('/Webmaster', [InicioController::class, 'Webmaster']);

Route::get('/Webmaster/salas-de-conferencia',[SalaWebmasterController::class, 'getTipoSala']);
Route::get('/Webmaster/salas-de-conferencia/tiposala/crear', [SalaWebmasterController::class, 'añadirTipoSala']);
Route::post('/Webmaster/salas-de-conferencia/tiposala/crear', [SalaWebmasterController::class, 'guardarTipoSala'])->name('tiposala.guardar');
Route::get('/Webmaster/salas-de-conferencia/tiposala/editar/{id}', [SalaWebmasterController::class, 'editarTipoSala']);
Route::put('/Webmaster/salas-de-conferencia/tiposala/editar/{id}', [SalaWebmasterController::class, 'actualizarTipoSala'])->name('tiposala.actualizar');
Route::delete('/Webmaster/salas-de-conferencia/tiposala/{id}', [SalaWebmasterController::class, 'deleteTipoSala']);

Route::get('/Webmaster/salas-de-conferencia/sala/crear', [SalaWebmasterController::class, 'añadirSala']);
Route::post('/Webmaster/salas-de-conferencia/sala/crear', [SalaWebmasterController::class, 'guardarSala'])->name('sala.guardar');
Route::get('/Webmaster/salas-de-conferencia/sala/editar/{id}', [SalaWebmasterController::class, 'editarSala']);
Route::put('/Webmaster/salas-de-conferencia/sala/editar/{id}', [SalaWebmasterController::class, 'actualizarSala'])->name('sala.actualizar');
Route::delete('/Webmaster/salas-de-conferencia/sala/{id}', [SalaWebmasterController::class, 'deleteSala']);

Route::get('/Webmaster/perfil', [PerfilWebmasterController::class, 'mi_perfil']);
Route::get('/Webmaster/perfil/editar-usuario', [PerfilWebmasterController::class, 'editar_perfil']);
Route::post('/Webmaster/perfil/editar-usuario/{email}', [PerfilWebmasterController::class, 'confirmar_editar']);
Route::get('/Webmaster/perfil/modificar-contraseña', [PerfilWebmasterController::class, 'modificar_contraseña']);
Route::post('/Webmaster/perfil/modificar-contraseña/{email}', [PerfilWebmasterController::class, 'confirmar_contraseña']);



Route::get('/Recepcionista', [InicioController::class, 'Recepcionista']);

Route::get('/Recepcionista/salas-de-conferencia',[SalaRecepcionistaController::class, 'getTipoSala']);
Route::get('/Recepcionista/salas-de-conferencia/{tipoid}/{id}',[DescripcionSalaController::class, 'getSalaRecepcionista'])->name('descripcion.sala.recepcionista');
Route::post('/Recepcionista/salas-de-conferencia/{tipoid}/{id}/toggle', [SalaRecepcionistaController::class, 'toggleDisponibilidad'])->name('sala.toggle');

Route::get('/Recepcionista/habitaciones',[HabitacionesRecepcionistaController::class, 'getTipoHabitaciones']);
Route::get('/Recepcionista/habitaciones/{tipoid}/{id}',[DescripcionHabitacionesController::class, 'getHabitacionesRecepcionista'])->name('descripcion.habitaciones.recepcionista');
Route::post('/Recepcionista/habitaciones/{tipoid}/{id}/toggle', [HabitacionesRecepcionistaController::class, 'toggleDisponibilidad'])->name('habitaciones.toggle');

Route::get('/Recepcionista/perfil', [PerfilRecepcionistaController::class, 'mi_perfil']);
Route::get('/Recepcionista/perfil/editar-usuario', [PerfilRecepcionistaController::class, 'editar_perfil']);
Route::post('/Recepcionista/perfil/editar-usuario/{email}', [PerfilRecepcionistaController::class, 'confirmar_editar']);
Route::get('/Recepcionista/perfil/modificar-contraseña', [PerfilRecepcionistaController::class, 'modificar_contraseña']);
Route::post('/Recepcionista/perfil/modificar-contraseña/{email}', [PerfilRecepcionistaController::class, 'confirmar_contraseña']);



Route::get('/Publico', [InicioController::class, 'Publico']); 


































use App\Http\Controllers\HabitacionesWebmasterController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SobreNosotrosController;


//Tablas de webMaster-CRUD
Route::get('/Webmaster/habitaciones', [HabitacionesWebmasterController::class, 'listarHabitaciones']);
Route::get('/Webmaster/habitaciones/crear', [HabitacionesWebmasterController::class, 'crearHabitacion']);
Route::post('/Webmaster/habitaciones/crear', [HabitacionesWebmasterController::class, 'guardarHabitacion'])->name('habitaciones.guardar');
Route::get('/Webmaster/habitaciones/editar/{id}', [HabitacionesWebmasterController::class, 'editarHabitacion']);
Route::put('/Webmaster/habitaciones/editar/{id}', [HabitacionesWebmasterController::class, 'actualizarHabitacion'])->name('habitaciones.actualizar');
Route::delete('/Webmaster/habitaciones/{id}', [HabitacionesWebmasterController::class, 'deleteHabitacion']);

//Mostrar formulario de reserva habitaciones
Route::get('/Usuario/habitaciones/{tipoid}/{id}/reservar', [ReservaController::class, 'formularioReservaUsuario'])->name('usuario.reservar.form');
Route::get('/Recepcionista/habitaciones/{tipoid}/{id}/reservar', [ReservaController::class, 'formularioReservaRecepcionista'])->name('recepcionista.reservar.form');
Route::post('/Recepcionista/habitaciones/{tipoid}/{id}/reservar', [ReservaController::class, 'reservarRecepcionista'])->name('recepcionista.reservar');
Route::post('/Usuario/habitaciones/{tipoid}/{id}/reservar', [ReservaController::class, 'reservarUsuario'])->name('usuario.reservar');
//Vistas reserva hecha habitación 
Route::get('/Usuario/reserva/confirmacion/{id}', [ReservaController::class, 'mostrarConfirmacionReserva'])->name('usuario.reserva.confirmacion');

//Falta mas info en la vista a rellenar de momento solo fechas. Mostrar y Hacer formularios
Route::get('/Usuario/salas-de-conferencia/{id}/reservar', [ReservaController::class, 'formularioReservaUsuarioSala'])->name('usuario.reservarSala.form');
Route::post('/Usuario/salas-de-conferencia/{id}/reservar', [ReservaController::class, 'reservarUsuarioSala']) ->name('usuario.reservar.sala');
Route::get('/Recepcionista/salas-de-conferencia/{id}/reservar', [ReservaController::class, 'formularioReservaRecepcionistaSala'])->name('recepcionista.reservarSala.form');
Route::post('/Recepcionista/salas-de-conferencia/{id}/reservar', [ReservaController::class, 'reservarRecepcionistaSala'])->name('recepcionista.reservar.sala');
//confirmar reserva
Route::get('/Usuario/salas/reserva/confirmacion/{id}', [ReservaController::class, 'mostrarConfirmacionReservaSala'])->name('usuario.reservaSala.confirmacion');

//Info extra usuario habitacion + reserva
Route::get('/Usuario/habitaciones/{tipoid}/{id}',[HabitacionesUsuarioController::class, 'getHabitacionDetalle'])->name('usuario.habitacion.detalle');



