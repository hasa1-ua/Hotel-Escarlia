<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuarioWebmasterController extends Controller{

    public function getUsuarios(Request $request){

        $rol = $request->get('rol');
        
        $usuarios = User::query()->when($rol !== null, function($query) use ($rol) {
            return $query->where('rol', $rol);})->paginate(5, ['*'], 'reserva_pagina');
    
        // Retorna la vista con ambas variables
        return view('homes.inicioWebmaster', ['usuarios' => $usuarios]);
    }

    public function deleteUsuario($id){
        $usuarios = User::find($id);
        $usuarios->eliminarUsuario();
        return redirect('/Webmaster/usuarios');
    }

    public function editarUsuario($id){
        $usuarios = User::find($id);
        return view('editar.editarUsuario', ['usuarios'=>$usuarios]);
    }

    
    public function añadirUsuario(){
        $usuarios = new User();
        return view('crear.crearUsuario', ['usuarios'=>$usuarios]);
    }

    public function actualizarUsuario($id, Request $request){

        $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'telefono' => 'nullable|numeric',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|string|max:255',
            'nacionalidad' => 'nullable|string|max:255',
            'pais_residencia' => 'nullable|string|max:255',
        ],[
            'email.unique' => 'El correo electrónico ya está registrado.', // Mensaje personalizado
            'email.email' => 'Por favor, introduce un correo electrónico válido.',
            'nombre_usuario.required' => 'El nombre de usuario es obligatorio.', // Mensaje personalizado
        ]);

        $usuarios = User::find($id);
    
        
	    $usuarios->nombre_usuario = $request->nombre_usuario;
	    $usuarios->email = $request->email;
	    $usuarios->telefono = $request->telefono;
	    $usuarios->fecha_nacimiento = $request->fecha_nacimiento;
        $usuarios->direccion = $request->direccion;
        $usuarios->nacionalidad = $request->nacionalidad;
        $usuarios->pais_residencia = $request->pais_residencia ;
        $usuarios->rol = $request->rol;

	    $usuarios->save();
        return redirect('/Webmaster/usuarios');
    }

    public function guardarUsuario(Request $request){

        $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,',
            'telefono' => 'nullable|numeric',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|string|max:255',
            'nacionalidad' => 'nullable|string|max:255',
            'pais_residencia' => 'nullable|string|max:255',
            'password' => 'required|string|max:255'
        ],[
            'email.unique' => 'El correo electrónico ya está registrado.', // Mensaje personalizado
            'email.required' => 'El correo electronico es obligatorio.',
            'nombre_usuario.required' => 'El nombre de usuario es obligatorio.', // Mensaje personalizado
            'password.required' => 'La contraseña es obligatorio.'
            
        ]);

        $usuarios = new User();
    
        
	    $usuarios->nombre_usuario = $request->nombre_usuario;
	    $usuarios->email = $request->email;
	    $usuarios->telefono = $request->telefono;
	    $usuarios->fecha_nacimiento = $request->fecha_nacimiento;
        $usuarios->direccion = $request->direccion;
        $usuarios->nacionalidad = $request->nacionalidad;
        $usuarios->pais_residencia = $request->pais_residencia ;
        $usuarios->password = Hash::make($request->password);
        $usuarios->rol = $request->rol;
	    $usuarios->save();
        return redirect('/Webmaster/usuarios');
    }

    
}

