<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sala;
use App\Models\Foto;

// Controlador para la tabla Salas
class descripcionSalaUsuarioController extends Controller{

    public function getSalaUsuario($tipoid, $id){
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
        return view('descripciones.descripcionUsuarioSala', [
            'sala' => $sala,
            'fotos' => $fotos,
            'previousSala' => $previousSala,
            'nextSala' => $nextSala,
            'salasMismoTipo' => $salasMismoTipo
        ]);
    }

    public function getSalaRecepcionista($tipoid, $id)
    {
        $sala = Sala::selectidbySala($id);

        // Obtén todas las salas del mismo tipo
        $salasMismoTipo = Sala::where('tipo_sala_id', $sala->tipo_sala_id)
            ->orderBy('id')
            ->get();

        // Encuentra el índice de la sala actual
        $currentIndex = $salasMismoTipo->search(fn($item) => $item->id === $sala->id);

        // Sala anterior y siguiente
        $previousSala = $salasMismoTipo->get($currentIndex + 1) ?? $salasMismoTipo->last();
        $nextSala = $salasMismoTipo->get($currentIndex - 1) ?? $salasMismoTipo->first();

        // Obtener las fotos asociadas a la sala actual
        $fotos = Foto::where('sala_id', $sala->id)->get();

        // Retornar la vista con los datos
        return view('descripciones.descripcionSalaRecepcionista', [
            'sala' => $sala,
            'fotos' => $fotos,
            'previousSala' => $previousSala,
            'nextSala' => $nextSala,
            'salasMismoTipo' => $salasMismoTipo
        ]);
    }
}