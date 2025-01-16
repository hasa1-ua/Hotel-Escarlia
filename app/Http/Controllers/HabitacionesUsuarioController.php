<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TipoHabitacion;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionesUsuarioController extends Controller
{
    public function getTipoHabitacion()
    {
        $tiposhabitaciones = TipoHabitacion::all();
        return view('listas.listadoHabitacionesUsuario', ['tipo_habitaciones' => $tiposhabitaciones]);
    }

    public function getHabitacionDetalle($tipoid, $id)
    {
        $habitacion = Habitacion::findOrFail($id);
        
        // habitación siguiente y anterior
        $nextHabitacion = Habitacion::where('tipo_id', $tipoid)
                                    ->where('id', '>', $id)
                                    ->first();

        $previousHabitacion = Habitacion::where('tipo_id', $tipoid)
                                        ->where('id', '<', $id)
                                        ->orderBy('id', 'desc')
                                        ->first();

        $fotos = $habitacion->fotos ?? []; 

        return view('descripciones.descripcionHabitacionUsuario', [
            'habitacion' => $habitacion,
            'nextHabitacion' => $nextHabitacion,
            'previousHabitacion' => $previousHabitacion,
            'fotos' => $fotos
        ]);
    }
}
