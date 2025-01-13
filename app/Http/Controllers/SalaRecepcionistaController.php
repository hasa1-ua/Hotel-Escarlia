<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sala;
use App\Models\TipoSala;
use Illuminate\Http\Request;

class SalaRecepcionistaController extends Controller
{
    public function getTipoSala(){
        $tipossalas = TipoSala::all();
        return view('listas.listadoSalasRecepcionista', ['tipo_salas'=>$tipossalas]);
    }

    public function toggleDisponibilidad($id)
    {
        // Buscar la sala por su ID
        $sala = Sala::findOrFail($id);

        // Alternar el estado de disponibilidad
        $sala->disponible = !$sala->disponible;

        // Guardar los cambios
        $sala->save();

        // Redirigir con un mensaje de éxito
        return redirect()->back();
    }
}
