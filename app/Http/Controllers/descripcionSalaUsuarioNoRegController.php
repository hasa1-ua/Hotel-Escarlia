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

        $salasMismoTipo = Sala::where('tipo_sala_id', $sala->tipo_sala_id)
            ->orderBy('id')
            ->get();

        // Encuentra el índice de la sala actual
        $currentIndex = $salasMismoTipo->search(fn($item) => $item->id === $sala->id);

        // Sala anterior y siguiente
        $previousSala = $salasMismoTipo->get($currentIndex + 1) ?? $salasMismoTipo->last();
        $nextSala = $salasMismoTipo->get($currentIndex - 1) ?? $salasMismoTipo->first();

        $fotos = Foto::where('sala_id', $sala->id)->get();
        //Pasaremos todos los IDs a la vista de descripciones de sala
        return view('descripciones.descripcionUsuarioNoRegSala', [
            'sala' => $sala,
            'fotos' => $fotos,
            'previousSala' => $previousSala,
            'nextSala' => $nextSala,
            'salasMismoTipo' => $salasMismoTipo
        ]);
    }

}