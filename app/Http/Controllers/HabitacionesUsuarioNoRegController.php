<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\TipoHabitacion;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionesUsuarioNoRegController extends Controller
{
    public function getTipoHabitacion()
    {
        $tiposhabitaciones = TipoHabitacion::all();
        return view('listas.listadoHabitacionesUsuarioNoReg', ['tipo_habitaciones' => $tiposhabitaciones]);
    }

    public function getHabitacionDetalle($tipoid, $id)
    {
        $habitacion = Habitacion::selectidbytype($id);

        if($habitacion == null){
            $habitacion = Habitacion::selectidbytype($id+1);
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

        return view('descripciones.descripcionHabitacionUsuarioNoReg', [
            'habitacion' => $habitacion,
            'nextHabitacion' => $nextHabitacion,
            'previousHabitacion' => $previousHabitacion,
            'fotos' => $fotos,
            'habitacionesMismoTipo' => $habitacionesMismoTipo
        ]);
    }
}
