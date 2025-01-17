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
        // Si la sala no existe, sumar uno en el id
        if($sala == null){
            $sala = Sala::selectidbytype($id+1);
        }
            
        // Validar si la sala existe
        if (!$sala) {
            return redirect()->back()->withErrors('No se encontró la sala solicitada.');
        }

        // Obtener salas del mismo tipo
        $salasMismoTipo = Sala::where('tipo_sala_id', $sala->tipo_sala_id)
        ->where('disponible', true)
        ->orderBy('id')
        ->get();

        // Encontrar la posición de la sala actual
        $currentIndex = $salasMismoTipo->search(fn($item) => $item->id === $sala->id);
        $previousSala = $salasMismoTipo->get($currentIndex + 1) ?? $salasMismoTipo->last();
        $nextSala = $salasMismoTipo->get($currentIndex - 1) ?? $salasMismoTipo->first();

        // Obtener las fotos asociadas a la sala
        $fotos = Foto::where('sala_id', $sala->id)->get();

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
        $sala = Sala::where('id', $id)
                    ->where('tipo_sala_id', $tipoid)
                    ->first();

        if (!$sala) {
            return redirect()->back()->withErrors('No se encontró la sala solicitada.');
        }

        $salasMismoTipo = Sala::where('tipo_sala_id', $sala->tipo_sala_id)
                              ->orderBy('id')
                              ->get();

        $currentIndex = $salasMismoTipo->search(fn($item) => $item->id === $sala->id);
        $previousSala = $salasMismoTipo->get($currentIndex + 1) ?? $salasMismoTipo->last();
        $nextSala = $salasMismoTipo->get($currentIndex - 1) ?? $salasMismoTipo->first();

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
