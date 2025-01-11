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

    public function actualizar_perfil($email, Request $request){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('/Usuario');
        }

        $usuario = User::buscarPorEmail($email);
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
}
