<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sala;
use App\Models\Foto;

// Controlador para la tabla Salas
class descripcionSalaUsuarioNoRegController extends Controller{

    public function getSalaUsuario($id){
        //Escoge todos los IDs de sala
        $sala = Sala::selectidbytype($id);

        $fotos = Foto::where('sala_id', $sala->id)->get();
        //Pasaremos todos los IDs a la vista de descripciones de sala
        return view('descripciones.descripcionUsuarioNoRegSala', ['sala'=>$sala, 'fotos' => $fotos]);
    }

}