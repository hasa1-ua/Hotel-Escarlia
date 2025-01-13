<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sala;
use App\Models\Foto;

// Controlador para la tabla Salas
class DescripcionSalaController extends Controller{

    public function getSalaUsuario($id){
        //Escoge todos los IDs de sala
        $sala = Sala::selectidbytype($id);

        $fotos = Foto::where('sala_id', $sala->id)->get();
        //Pasaremos todos los IDs a la vista de descripciones de sala
        return view('descripciones.descripcionSalaUsuario', ['sala'=>$sala, 'fotos' => $fotos]);
    }

    public function getSalaRecepcionista($id){
        // Obtén la sala actual
        $sala = Sala::find($id);
    
        // Obtén todas las salas del mismo tipo (puedes modificar la lógica según lo que necesitas)
        $salasMismoTipo = Sala::where('tipo_sala_id', $sala->tipo_sala_id)->get();
    
        // Encuentra el índice de la sala actual
        $currentIndex = $salasMismoTipo->search(fn($item) => $item->id === $sala->id);
    
        // Sala anterior y siguiente
        $previousSala = $salasMismoTipo->get($currentIndex - 1) ?? $salasMismoTipo->last(); // Si no hay anterior, toma el último
        $nextSala = $salasMismoTipo->get($currentIndex + 1) ?? $salasMismoTipo->first(); // Si no hay siguiente, toma el primero
    
        // Obtener las fotos asociadas a la sala
        $fotos = Foto::where('sala_id', $sala->id)->get();
    
        return view('descripciones.descripcionSalaRecepcionista', [
            'sala' => $sala,
            'fotos' => $fotos,
            'previousSala' => $previousSala,
            'nextSala' => $nextSala,
            'salasMismoTipo' => $salasMismoTipo
        ]);
    }
}