<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilRecepcionistaController extends Controller
{
    public function mi_perfil(){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('/Recepcionista');
        }

        return view('perfil/perfilRecepcionista', ['usuario' => $usuario]);
    }

    public function editar_perfil(){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('/Recepcionista');
        }

        return view('perfil/editarPerfilRecepcionista', ['usuario' => $usuario]);
    }

    public function confirmar_editar($email, Request $request){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('/Recepcionista');
        }

        $usuario = User::obtenerUsuarioPorEmail($email);
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->email = $email;
        if($request->password){
            $usuario->password = Hash::make($request->password);
        }
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->nacionalidad = $request->nacionalidad;
        $usuario->pais_residencia = $request->pais_residencia;
        $usuario->save();

        return redirect('/Recepcionista/perfil');
    }

    public function modificar_contraseña(){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('/Recepcionista');
        }

        return view('perfil/modificarContraseñaRecepcionista', ['usuario' => $usuario]);
    }

    public function confirmar_contraseña($email, Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:4',
            'repeat_password' => 'required|same:new_password',
        ]);

        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('/Recepcionista');
        }

        $usuario = User::obtenerUsuarioPorEmail($email);

        $usuario->password = Hash::make($request->new_password);
        $usuario->save();

        return redirect('/Recepcionista/perfil');
    }

    public function validarContraseñaActual(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
        ]);

        $usuario = Auth::user();

        if (!$usuario || !Hash::check($request->current_password, $usuario->password)) {
            return response()->json(['valid' => false]);
        }

        return response()->json(['valid' => true]);
    }

    public function about(){
        return view('extras/sobre-nosotros-rec');
    }
}
