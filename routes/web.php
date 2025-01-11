<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\listadoSalaController;
use App\Http\Controllers\DescripcionSalaController;
use App\Http\Controllers\PerfilUsuario;
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
    $user = User::find(3); // Cambia el ID al de tu usuario
    if ($user) {
        auth()->login($user);
        return redirect('/Usuario'); // Cambia la ruta según tu proyecto
    }
    return "Usuario no encontrado";
});

Route::get('/simulate-logout', function () {
    auth()->logout();
    return redirect('/Usuario'); // Cambia la ruta según tu proyecto
});

Route::get('/', function () {
    return redirect('/Usuario');
});

Route::get('/Usuario', [InicioController::class, 'Usuario']);

Route::get('/Usuario/salas-de-conferencia',[SalaUsuarioController::class, 'getTipoSala']);
//En salas hay que pasarle atributos de TipoSala
Route::get('/Usuario/salas-de-conferencia/{id}',[DescripcionSalaController::class, 'getSala']);


Route::get('/Usuario/perfil', [PerfilUsuario::class, 'mi_perfil']);
Route::get('/Usuario/perfil/editar-usuario', [PerfilUsuario::class, 'editar_perfil']);
Route::post('/Usuario/perfil/editar-usuario/{email}', [PerfilUsuario::class, 'confirmar_editar'])->name('perfil.confirmarEditar');
Route::get('/Usuario/perfil/modificar-contraseña', [PerfilUsuario::class, 'modificar_contraseña']);
Route::post('/Usuario/perfil/modificar-contraseña/{email}', [PerfilUsuario::class, 'confirmar_contraseña'])->name('perfil.confirmarContraseña');

Route::get('/Webmaster', [InicioController::class, 'Webmaster']);


Route::get('/Recepcionista', [InicioController::class, 'Recepcionista']);