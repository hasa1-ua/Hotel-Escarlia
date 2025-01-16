<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\TipoHabitacion;

class HabitacionesWebmasterController extends Controller
{
    public function listarHabitaciones()  
    {
        $habitaciones = Habitacion::paginate(10);
        return view('listas.listadoHabitacionesWebmaster', compact('habitaciones'));
    }

    public function crearHabitacion()  
    {
        $tiposHabitacion = TipoHabitacion::all();
        return view('crear.crearHabitacion', compact('tiposHabitacion'));
    }


    public function editarHabitacion($id) 
    {
        $habitacion = Habitacion::findOrFail($id);
        $tiposHabitacion = TipoHabitacion::all();
        return view('editar.editarHabitaciones', compact('habitacion', 'tiposHabitacion'));
    }


    public function guardarHabitacion(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer|unique:habitaciones,numero',
            'planta' => 'required|integer',
            'vistas' => 'nullable|string',
            'disponible' => 'required|boolean',
        ]);

        Habitacion::create([
            'numero' => $request->numero,
            'planta' => $request->planta,
            'vistas' => $request->vistas,
            'disponible' => $request->disponible,
        ]);

        return redirect('/Webmaster/habitaciones')->with('success', 'Habitación creada');
    }

    public function actualizarHabitacion(Request $request, $id)
    {
        $request->validate([
            'numero' => 'required|integer|unique:habitaciones,numero,' . $id,
            'planta' => 'required|integer',
            'vistas' => 'nullable|string',
            'disponible' => 'required|boolean',
        ]);

        $habitacion = Habitacion::findOrFail($id);
        $habitacion->update([
            'numero' => $request->numero,
            'planta' => $request->planta,
            'vistas' => $request->vistas,
            'disponible' => $request->disponible,
        ]);

        return redirect('/Webmaster/habitaciones');
    }

    public function deleteHabitacion($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $habitacion->delete();

        return redirect('/Webmaster/habitaciones')->with('success', 'Habitación eliminada ');
    }
}
