<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Sala;
use App\Models\Foto;

class UsuarioWebmasterController extends Controller{

    public function getUsuarios(Request $request){

        $rol = $request->get('rol');
        
        $usuarios = User::query()->when($rol !== null, function($query) use ($rol) {
            return $query->where('rol', $rol);})->paginate(5, ['*'], 'reserva_pagina');
    
        // Retorna la vista con ambas variables
        return view('homes.inicioWebmaster', ['usuarios' => $usuarios]);
    }

    
}

