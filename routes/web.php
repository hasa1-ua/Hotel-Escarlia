<?php

use App\Http\Controllers\DescripcionHabitacionesController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\descripcionSalaUsuarioController;
use App\Http\Controllers\SalaWebmasterController;
use App\Http\Controllers\ExtrasUsuarioController;
use App\Http\Controllers\HabitacionesRecepcionistaController;
use App\Http\Controllers\HabitacionesUsuarioController;
use App\Http\Controllers\PerfilRecepcionistaController;
use App\Http\Controllers\PerfilUsuarioController;
use App\Http\Controllers\PerfilWebmasterController;
use App\Http\Controllers\ReservasRecepcionistaController;
use App\Http\Controllers\SalaRecepcionistaController;
use App\Http\Controllers\SalaUsuarioController;
use App\Http\Controllers\ReservaWebmasterController;
use App\Http\Controllers\CuponWebmasterController;
use App\Http\Controllers\TemporadaWebmasterController;
use App\Http\Controllers\RegimenWebmasterController;
use App\Http\Controllers\UsuarioWebmasterController;
use App\Http\Controllers\descripcionSalaUsuarioNoRegController;
use App\Http\Controllers\SalaUsuarioNoRegController;
use App\Http\Controllers\HabitacionesWebmasterController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SobreNosotrosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HabitacionesUsuarioNoRegController;
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

Route::get('/', function () {
    return redirect('/Publico');
});

Route::get('/Publico', [InicioController::class, 'Publico']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/Publico/fotos', [PublicoController::class, 'getFotosPublico']);
Route::get('/Publico/habitaciones',[HabitacionesUsuarioNoRegController::class, 'getTipoHabitacion']);
Route::get('/Publico/habitaciones/{tipoid}/{id}',[HabitacionesUsuarioNoRegController::class, 'getHabitacionDetalle'])->name('usuarionoreg.habitacion.detalle');
Route::get('/Publico/salas-de-conferencia',[SalaUsuarioNoRegController::class, 'getTipoSala']);
Route::get('/Publico/salas-de-conferencia/{tipoid}/{id}',[descripcionSalaUsuarioNoRegController::class, 'getSalaUsuario'])->name('descripcion.sala.publico');
Route::get('/Publico/sobre-nosotros',[PublicoController::class, 'about']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/validate-user', [RegisterController::class, 'validateUser'])->name('validate-user');

Route::get('/permiso-denegado', function () {
    return view('errors.permiso-denegado');
});

    Route::middleware(['usuario.registrado'])->group(function () {
    Route::get('/Usuario', [InicioController::class, 'Usuario']);
    Route::get('/Usuario/salas-de-conferencia',[SalaUsuarioController::class, 'getTipoSala']);
    Route::get('/Usuario/salas-de-conferencia/{tipoid}/{id}',[descripcionSalaUsuarioController::class, 'getSalaUsuario'])->name('descripcion.sala.usuario');
    //Falta mas info en la vista a rellenar de momento solo fechas. Mostrar y Hacer formularios
    Route::get('/Usuario/salas-de-conferencia/{tipoid}/{id}/reservar', [ReservaController::class, 'formularioReservaUsuarioSala'])->name('usuario.reservarSala.form');
    Route::post('/Usuario/salas-de-conferencia/{tipoid}/{id}/reservar', [ReservaController::class, 'reservarUsuarioSala']) ->name('usuario.reservar.sala');
    //confirmar reserva
    Route::get('/Usuario/salas/reserva/confirmacion/{tipoid}/{id}', [ReservaController::class, 'mostrarConfirmacionReservaSala'])->name('usuario.reservaSala.confirmacion');


    Route::get('/Usuario/habitaciones',[HabitacionesUsuarioController::class, 'getTipoHabitacion']);
    Route::get('/Usuario/habitaciones/{tipoid}/{id}',[HabitacionesUsuarioController::class, 'getHabitacionDetalle'])->name('usuario.habitacion.detalle');
    //Mostrar formulario de reserva habitaciones
    Route::get('/Usuario/habitaciones/{tipoid}/{id}/reservar', [ReservaController::class, 'formularioReservaUsuario'])->name('usuario.reservar.form');
    Route::post('/Usuario/habitaciones/{tipoid}/{id}/reservar', [ReservaController::class, 'reservarUsuario'])->name('usuario.reservar');
    Route::get('/Usuario/sobre-nosotros',[PerfilUsuarioController::class, 'about']);
    Route::get('/Usuario/fotos', [ExtrasUsuarioController::class, 'getFotos']);

    Route::get('/Usuario/perfil', [PerfilUsuarioController::class, 'mi_perfil']);
    Route::get('/Usuario/perfil/editar-usuario', [PerfilUsuarioController::class, 'editar_perfil']);
    Route::post('/Usuario/perfil/editar-usuario/{email}', [PerfilUsuarioController::class, 'confirmar_editar']);
    Route::get('/Usuario/perfil/modificar-contraseña', [PerfilUsuarioController::class, 'modificar_contraseña']);
    Route::post('/Usuario/perfil/modificar-contraseña/{email}', [PerfilUsuarioController::class, 'confirmar_contraseña']);
    Route::post('/validar-contraseña-actual-Usuario', [PerfilUsuarioController::class, 'validarContraseñaActual']);

  
    //Vistas reserva hecha habitación 
    Route::get('/Usuario/reserva/confirmacion/{id}', [ReservaController::class, 'mostrarConfirmacionReserva'])->name('usuario.reserva.confirmacion');

});

    Route::middleware(['recepcionista'])->group(function () {
    Route::get('/Recepcionista', [InicioController::class, 'Recepcionista']);
    Route::get('/Recepcionista/salas-de-conferencia',[SalaRecepcionistaController::class, 'getTipoSala']);
    Route::get('/Recepcionista/salas-de-conferencia/{tipoid}/{id}',[descripcionSalaUsuarioController::class, 'getSalaRecepcionista'])->name('descripcion.sala.recepcionista');
    Route::post('/Recepcionista/salas-de-conferencia/{tipoid}/{id}/toggle', [SalaRecepcionistaController::class, 'toggleDisponibilidad'])->name('sala.toggle');

    Route::get('/Recepcionista/habitaciones',[HabitacionesRecepcionistaController::class, 'getTipoHabitaciones']);
    Route::get('/Recepcionista/habitaciones/{tipoid}/{id}',[DescripcionHabitacionesController::class, 'getHabitacionesRecepcionista'])->name('descripcion.habitaciones.recepcionista');
    Route::post('/Recepcionista/habitaciones/{tipoid}/{id}/toggle', [HabitacionesRecepcionistaController::class, 'toggleDisponibilidad'])->name('habitaciones.toggle');

    Route::get('/Recepcionista/perfil', [PerfilRecepcionistaController::class, 'mi_perfil']);
    Route::get('/Recepcionista/perfil/editar-usuario', [PerfilRecepcionistaController::class, 'editar_perfil']);
    Route::post('/Recepcionista/perfil/editar-usuario/{email}', [PerfilRecepcionistaController::class, 'confirmar_editar']);
    Route::get('/Recepcionista/perfil/modificar-contraseña', [PerfilRecepcionistaController::class, 'modificar_contraseña']);
    Route::post('/Recepcionista/perfil/modificar-contraseña/{email}', [PerfilRecepcionistaController::class, 'confirmar_contraseña']);
    Route::post('/validar-contraseña-actual-Recepcionista', [PerfilRecepcionistaController::class, 'validarContraseñaActual']);

    Route::get('/Recepcionista/reservas', [ReservasRecepcionistaController::class, 'getReservas']);
    Route::get('/Recepcionista/reservas/crear', [ReservasRecepcionistaController::class, 'crear'])->name('reservas.crear');
    Route::post('/Recepcionista/reservas/crear/guardar', [ReservasRecepcionistaController::class, 'guardar'])->name('reservas.guardar');
    Route::get('/Recepcionista/reservas/editar/{id}', [ReservasRecepcionistaController::class, 'editar']);
    Route::put('/Recepcionista/reservas/editar/{id}', [ReservasRecepcionistaController::class, 'actualizar'])->name('reservas.actualizar');
    Route::delete('/Recepcionista/reservas/borrar/{id}', [ReservasRecepcionistaController::class, 'borrarReserva']);

    Route::get('/Recepcionista/habitaciones/{tipoid}/{id}/reservar', [ReservaController::class, 'formularioReservaRecepcionista'])->name('recepcionista.reservar.form');
    Route::post('/Recepcionista/habitaciones/{tipoid}/{id}/reservar', [ReservaController::class, 'reservarRecepcionista'])->name('recepcionista.reservar');
    Route::get('/Recepcionista/salas-de-conferencia/{tipoid}/{id}/reservar', [ReservaController::class, 'formularioReservaRecepcionistaSala'])->name('recepcionista.reservarSala.form');
    Route::post('/Recepcionista/salas-de-conferencia/{tipoid}/{id}/reservar', [ReservaController::class, 'reservarRecepcionistaSala'])->name('recepcionista.reservar.sala');

    Route::get('/Recepcionista/sobre-nosotros',[PerfilRecepcionistaController::class, 'about']);
});

    Route::middleware(['webmaster'])->group(function () {
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

    Route::get('/Webmaster/menu-reservas/cupones',[CuponWebmasterController::class, 'getCupon']);
    Route::delete('/Webmaster/menu-reservas/cupones/{id}', [CuponWebmasterController::class, 'deleteCupon']);
    Route::get('/Webmaster/menu-reservas/cupones/editar/{id}', [CuponWebmasterController::class, 'editarCupon']);
    Route::put('/Webmaster/menu-reservas/cupones/editar/{id}', [CuponWebmasterController::class, 'actualizarCupon'])->name('cupones.actualizar');
    Route::get('/Webmaster/menu-reservas/cupones/crear', [CuponWebmasterController::class, 'añadirCupon']);
    Route::post('/Webmaster/menu-reservas/cupones/crear', [CuponWebmasterController::class, 'guardarCupon'])->name('cupones.guardar');

    Route::get('/Webmaster/menu-reservas/temporadas',[TemporadaWebmasterController::class, 'getTemporada']);
    Route::delete('/Webmaster/menu-reservas/temporadas/{id}', [TemporadaWebmasterController::class, 'deleteTemporada']);
    Route::get('/Webmaster/menu-reservas/temporadas/editar/{id}', [TemporadaWebmasterController::class, 'editarTemporada']);
    Route::put('/Webmaster/menu-reservas/temporadas/editar/{id}', [TemporadaWebmasterController::class, 'actualizarTemporada'])->name('temporadas.actualizar');
    Route::get('/Webmaster/menu-reservas/temporadas/crear', [TemporadaWebmasterController::class, 'añadirTemporada']);
    Route::post('/Webmaster/menu-reservas/temporadas/crear', [TemporadaWebmasterController::class, 'guardarTemporada'])->name('temporadas.guardar');


    Route::get('/Webmaster/menu-reservas/regimenes',[RegimenWebmasterController::class, 'getRegimen']);
    Route::delete('/Webmaster/menu-reservas/regimenes/{id}', [RegimenWebmasterController::class, 'deleteRegimen']);
    Route::get('/Webmaster/menu-reservas/regimenes/editar/{id}', [RegimenWebmasterController::class, 'editarRegimen']);
    Route::put('/Webmaster/menu-reservas/regimenes/editar/{id}', [RegimenWebmasterController::class, 'actualizarRegimen'])->name('regimenes.actualizar');
    Route::get('/Webmaster/menu-reservas/regimenes/crear', [RegimenWebmasterController::class, 'añadirRegimen']);
    Route::post('/Webmaster/menu-reservas/regimenes/crear', [RegimenWebmasterController::class, 'guardarRegimen'])->name('regimenes.guardar');


    Route::get('/Webmaster/menu-reservas/reservas',[ReservaWebmasterController::class, 'getReserva']);
    Route::get('/Webmaster/menu-reservas/reservas/editar/{id}', [ReservaWebmasterController::class, 'editarReserva']);
    Route::put('/Webmaster/menu-reservas/reservas/editar/{id}', [ReservaWebmasterController::class, 'actualizarReserva'])->name('reservas.actualizar');
    Route::delete('/Webmaster/menu-reservas/reservas/{id}', [ReservaWebmasterController::class, 'deleteReserva']);
    Route::get('/Webmaster/menu-reservas/reservas/crear', [ReservaWebmasterController::class, 'añadirReserva']);
    Route::post('/Webmaster/menu-reservas/reservas/crear', [ReservaWebmasterController::class, 'guardarReserva'])->name('reservas.guardar');

    Route::get('/Webmaster/usuarios',[UsuarioWebmasterController::class, 'getUsuarios']);
    Route::delete('/Webmaster/usuarios/{id}', [UsuarioWebmasterController::class, 'deleteUsuario']);
    Route::get('/Webmaster/usuarios/editar/{id}', [UsuarioWebmasterController::class, 'editarUsuario']);
    Route::put('/Webmaster/usuarios/editar/{id}', [UsuarioWebmasterController::class, 'actualizarUsuario'])->name('usuarios.actualizar');
    Route::get('/Webmaster/usuarios/crear', [UsuarioWebmasterController::class, 'añadirUsuario']);
    Route::post('/Webmaster/usuarios/crear', [UsuarioWebmasterController::class, 'guardarUsuario'])->name('usuarios.guardar');


    Route::get('/Webmaster/perfil', [PerfilWebmasterController::class, 'mi_perfil']);
    Route::get('/Webmaster/perfil/editar-usuario', [PerfilWebmasterController::class, 'editar_perfil']);
    Route::post('/Webmaster/perfil/editar-usuario/{email}', [PerfilWebmasterController::class, 'confirmar_editar']);
    Route::get('/Webmaster/perfil/modificar-contraseña', [PerfilWebmasterController::class, 'modificar_contraseña']);
    Route::post('/Webmaster/perfil/modificar-contraseña/{email}', [PerfilWebmasterController::class, 'confirmar_contraseña']);
    Route::post('/validar-contraseña-actual-Webmaster', [PerfilWebmasterController::class, 'validarContraseñaActual']);
    Route::get('/Webmaster/sobre-nosotros',[PerfilWebmasterController::class, 'about']);

    //Tablas de webMaster-CRUD
    Route::get('/Webmaster/habitaciones', [HabitacionesWebmasterController::class, 'listarHabitaciones']);
    Route::get('/Webmaster/habitaciones/crear', [HabitacionesWebmasterController::class, 'crearHabitacion']);
    Route::post('/Webmaster/habitaciones/crear', [HabitacionesWebmasterController::class, 'guardarHabitacion'])->name('habitaciones.guardar');
    Route::get('/Webmaster/habitaciones/editar/{id}', [HabitacionesWebmasterController::class, 'editarHabitacion']);
    Route::put('/Webmaster/habitaciones/editar/{id}', [HabitacionesWebmasterController::class, 'actualizarHabitacion'])->name('habitaciones.actualizar');
    Route::delete('/Webmaster/habitaciones/{id}', [HabitacionesWebmasterController::class, 'deleteHabitacion']);
    Route::delete('/Webmaster/habitaciones/editar/{id}', [HabitacionesWebmasterController::class, 'deleteImagen'])->name('habitacion.eliminarImagen');

}); 



