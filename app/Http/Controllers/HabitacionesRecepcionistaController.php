<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Habitacion;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;

class HabitacionesRecepcionistaController extends Controller
{
    public function getTipoHabitaciones(){
        $tiposhabitaciones = TipoHabitacion::all();
        return view('listas.listadoHabitacionesRecepcionista', ['tipo_habitaciones'=>$tiposhabitaciones]);
    }

    public function toggleDisponibilidad($tipoid, $id)
    {
        // Buscar la sala por su ID
        $habitacion = Habitacion::findOrFail($id);

        // Alternar el estado de disponibilidad
        $habitacion->disponible = !$habitacion->disponible;

        // Guardar los cambios
        $habitacion->save();

        // Redirigir con un mensaje de éxito
        return redirect()->back();
    }
}
