<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilUsuario extends Controller
{
    public function mi_perfil(){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('/Usuario');
        }

        return view('perfil/perfilUsuario', ['usuario' => $usuario]);
    }

    public function editar_perfil(){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('/Usuario');
        }

        return view('perfil/editarPerfilUsuario', ['usuario' => $usuario]);
    }

    public function confirmar_editar($email, Request $request){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('/Usuario');
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

        return redirect('/Usuario/perfil');
    }

    public function modificar_contraseña(){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('/Usuario');
        }

        return view('perfil/modificarContraseña', ['usuario' => $usuario]);
    }

    public function confirmar_contraseña($email, Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'repeat_password' => 'required|same:new_password',
        ]);

        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('/Usuario');
        }

        $usuario = User::obtenerUsuarioPorEmail($email);

        // Verificar si la contraseña actual es correcta
        if (!Hash::check($request->current_password, $usuario->password)) {
            return back()->with('error', 'La contraseña actual no es correcta.');
        }

        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return redirect('/Usuario/perfil');
    }
}
