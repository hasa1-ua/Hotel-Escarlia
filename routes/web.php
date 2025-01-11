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

Route::get('/simulate-login', function () {
    $user = User::find(3); // Cambia el ID al de tu usuario
    if ($user) {
        auth()->login($user);
        return redirect('/Usuario'); // Cambia la ruta según tu proyecto
    }
    return "Usuario no encontrado";
});

Route::get('/', function () {
    return redirect('/Usuario');
});

Route::get('/Usuario', [InicioController::class, 'Usuario']);

Route::get('/Admin', [InicioController::class, 'Admin']);

Route::get('/Usuario/salas-de-conferencia',[SalaUsuarioController::class, 'getTipoSala']);
//En salas hay que pasarle atributos de TipoSala
Route::get('/Usuario/salas-de-conferencia/{id}',[DescripcionSalaController::class, 'getSala']);

Route::get('/Usuario/perfil', [PerfilUsuario::class, 'mi_perfil']);


Route::get('/Usuario/perfil/editar-usuario', [PerfilUsuario::class, 'mi_perfil']);
Route::post('/Usuario/perfil/editar-usuario', [PerfilUsuario::class, 'actualizar_perfil']);