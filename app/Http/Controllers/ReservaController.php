<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Habitacion;
use App\Models\Sala;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function formularioReservaUsuario($habitacion_id)
    {
        $habitacion = Habitacion::findOrFail($habitacion_id);
        return view('reservas.formularioReservaUsuario', compact('habitacion'));
    }

    public function reservarUsuario(Request $request, $habitacion_id)
    {
        $request->validate([
            'fecha_inicio' => 'required|date|after_or_equal:today',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        $habitacion = Habitacion::findOrFail($habitacion_id);
        $dias = now()->parse($request->fecha_inicio)->diffInDays(now()->parse($request->fecha_fin));
        $precio_total = $dias * $habitacion->precio;

        $reserva = Reserva::create([
            'habitacion_id' => $habitacion_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => 'Pendiente',
            'precio_total' => $precio_total,
        ]);

        return view('reservas.confirmacionReservaHabitacion', compact('reserva'));
    }

    public function formularioReservaRecepcionista($habitacion_id)
    {
        $habitacion = Habitacion::findOrFail($habitacion_id);
        return view('reservas.formularioReservaRecepcionista', compact('habitacion'));
    }

    public function reservarRecepcionista(Request $request, $habitacion_id)
    {
        $request->validate([
            'fecha_inicio' => 'required|date|after_or_equal:today',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        $habitacion = Habitacion::findOrFail($habitacion_id);
        $dias = now()->parse($request->fecha_inicio)->diffInDays(now()->parse($request->fecha_fin));
        $precio_total = $dias * $habitacion->precio;

        $reserva = Reserva::create([
            'habitacion_id' => $habitacion_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => 'Confirmada',
            'precio_total' => $precio_total,
        ]);

        return view('reservas.confirmacionReservaHabitacion', compact('reserva'));
    }

    public function finalizarReserva($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->estado = 'Confirmada';
        $reserva->save();

        return back()->with('success', 'Reserva confirmada correctamente.');
    }


    public function formularioReservaUsuarioSala($sala_id)
    {
        $sala = Sala::findOrFail($sala_id);
        return view('reservas.formularioReservaUsuarioSala', compact('sala'));
    }


    public function reservarUsuarioSala(Request $request, $sala_id)
    {
        $request->validate([
            'fecha_inicio' => 'required|date|after_or_equal:today',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        $sala = Sala::with('tipoSala')->findOrFail($sala_id);
        $dias = now()->parse($request->fecha_inicio)->diffInDays(now()->parse($request->fecha_fin));
        $precio_total = $dias * $sala->tipoSala->precio;

        $reserva = Reserva::create([
            'usuario_id' => auth()->id(),
            'sala_id' => $sala->id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => 'Pendiente',
            'precio_total' => $precio_total,
        ]);

        return view('reservas.confirmacionReservaSalas', compact('reserva', 'sala'));
    }


    public function formularioReservaRecepcionistaSala($sala_id)
    {
        $sala = Sala::findOrFail($sala_id);
        return view('reservas.formularioReservaRecepcionistaSala', compact('sala'));
    }

    public function reservarRecepcionistaSala(Request $request, $sala_id)
    {
        $request->validate([
            'fecha_inicio' => 'required|date|after_or_equal:today',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        $sala = Sala::findOrFail($sala_id);
        $dias = now()->parse($request->fecha_inicio)->diffInDays(now()->parse($request->fecha_fin));
        $precio_total = $dias * $sala->tipoSala->precio;

        $reserva = Reserva::create([
            'sala_id' => $sala->id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => 'Confirmada',
            'precio_total' => $precio_total,
        ]);

        return view('reservas.confirmacionReservaSalas', compact('reserva'));
    }

    public function mostrarConfirmacionReserva($id)
    {
        $reserva = Reserva::with('habitacion')->findOrFail($id);
        return view('reservas.confirmacionReservaHabitacion', compact('reserva'));
    }

    public function mostrarConfirmacionReservaSala($id)
    {
        $reserva = Reserva::with('sala')->findOrFail($id);
        return view('reservas.confirmacionReservaSalas', compact('reserva'));
    }
}
