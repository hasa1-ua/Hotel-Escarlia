<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TipoSala;

// Controlador para la tabla TipoSala
class SalaUsuarioNoRegController extends Controller{

    public function getTipoSala(){
        $tipossalas = TipoSala::all();
        return view('listas.listadoUsuarioNoRegSalas', ['tipo_salas'=>$tipossalas]);
    }
}