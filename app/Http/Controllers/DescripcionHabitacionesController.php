<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class DescripcionHabitacionesController extends Controller
{
    public function getHabitacionesUsuario($tipoid, $id){
        //Escoge todos los IDs de sala
        $habitacion = Habitacion::selectidbytype($id);

        if($habitacion == null){
            $habitacion = Habitacion::selectidbytype($id+1);
        }

        if (!$habitacion) {
            return redirect()->back()->withErrors('No se encontró la habitacion solicitada.');
        }

        $habitacionesMismoTipo = Habitacion::where('tipo_id', $habitacion->tipo_id)
            ->where('disponible', true)
            ->orderBy('id')
            ->get();

        // Encuentra el índice de la sala actual
        $currentIndex = $habitacionesMismoTipo->search(fn($item) => $item->id === $habitacion->id);

        // Sala anterior y siguiente
        $previousHabitacion = $habitacionesMismoTipo->get($currentIndex + 1) ?? $habitacionesMismoTipo->last();
        $nextHabitacion = $habitacionesMismoTipo->get($currentIndex - 1) ?? $habitacionesMismoTipo->first();

        $fotos = Foto::where('habitacion_id', $habitacion->id)->get();
        //Pasaremos todos los IDs a la vista de descripciones de sala
        return view('descripciones.descripcionHabitacionUsuario', [
            'habitacion' => $habitacion,
            'fotos' => $fotos,
            'previousHabitacion' => $previousHabitacion,
            'nextHabitacion' => $nextHabitacion,
            'habitacionesMismoTipo' => $habitacionesMismoTipo
        ]);
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

        // Obtener las fotos asociadas a la sala actual
        $fotos = Foto::where('habitacion_id', $habitacion->id)->get();

        // Retornar la vista con los datos
        return view('descripciones.descripcionHabitacionRecepcionista', [
            'habitacion' => $habitacion,
            'fotos' => $fotos,
            'previousHabitacion' => $previousHabitacion,
            'nextHabitacion' => $nextHabitacion,
            'habitacionesMismoTipo' => $habitacionesMismoTipo
        ]);
    }

    public function getHabitacionesUsuarioNoReg($tipoid, $id){
        //Escoge todos los IDs de sala
        $habitacion = Habitacion::selectidbytype($id);

        $habitacionesMismoTipo = Habitacion::where('tipo_id', $habitacion->tipo_id)
            ->orderBy('id')
            ->get();

        // Encuentra el índice de la sala actual
        $currentIndex = $habitacionesMismoTipo->search(fn($item) => $item->id === $habitacion->id);

        // Sala anterior y siguiente
        $previousHabitacion = $habitacionesMismoTipo->get($currentIndex + 1) ?? $habitacionesMismoTipo->last();
        $nextHabitacion = $habitacionesMismoTipo->get($currentIndex - 1) ?? $habitacionesMismoTipo->first();

        $fotos = Foto::where('habitacion_id', $habitacion->id)->get();
        //Pasaremos todos los IDs a la vista de descripciones de sala
        return view('descripciones.descripcionHabitacionUsuarioNoReg', [
            'habitacion' => $habitacion,
            'fotos' => $fotos,
            'previousHabitacion' => $previousHabitacion,
            'nextHabitacion' => $nextHabitacion,
            'habitacionesMismoTipo' => $habitacionesMismoTipo
        ]);
    }
    
}
