<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class DescripcionHabitacionesController extends Controller
{
    public function getHabitacionesUsuario($id){
        $habitacion = Habitacion::selectidbytype($id);
        $fotos = Foto::where('habitacion_id', $habitacion->id)->get();
        return view('descripciones.descripcionHabitacionUsuario', ['sala'=>$habitacion, 'fotos' => $fotos]);
    }

    public function getHabitacionesRecepcionista($tipoid, $id)
    {
        $habitacion = Habitacion::selectidbyHabitacion($id);
    
        if (!$habitacion) {
            return redirect()->back()->with('error', 'La habitación no fue encontrada.');
        }
    
        // todas las habitaciones del mismo tipo
        $habitacionesMismoTipo = Habitacion::where('tipo_id', $habitacion->tipo_id)
                                            ->orderBy('id')
                                            ->get();
    
        // indice x habitacion
        $currentIndex = $habitacionesMismoTipo->search(fn($item) => $item->id === $habitacion->id);
        //paso entre habitaciones
        $previousHabitacion = $habitacionesMismoTipo->get($currentIndex + 1) ?? $habitacionesMismoTipo->last();
        $nextHabitacion = $habitacionesMismoTipo->get($currentIndex - 1) ?? $habitacionesMismoTipo->first();
    
        $fotos = Foto::where('habitacion_id', $habitacion->id)->get();
    
        return view('descripciones.descripcionHabitacionRecepcionista', [
            'habitacion' => $habitacion,
            'fotos' => $fotos,
            'previousHabitacion' => $previousHabitacion,
            'nextHabitacion' => $nextHabitacion,
            'habitacionesMismoTipo' => $habitacionesMismoTipo
        ]);
    }
    
}
