<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Habitacion;
use App\Models\Sala;
use App\Models\Regimen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservaController extends Controller
{
    public function formularioReservaUsuario($habitacion_id)
    {
        $regimenes = Regimen::all();
        $habitacion = Habitacion::findOrFail($habitacion_id);
        return view('reservas.formularioReservaUsuario', compact('habitacion', 'regimenes'));
    }

    public function reservarUsuario(Request $request, $habitacion_id)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        $habitacion = Habitacion::with('tipo')->findOrFail($habitacion_id);
        $dias = now()->parse($request->fecha_inicio)->diffInDays(now()->parse($request->fecha_fin));
        $precio_total = $dias * $habitacion->tipo->precio;

        $reserva = Reserva::create([
            'usuario_id' => auth()->id(),
            'regimen_id' => $request->regimen_id,
            'habitacion_id' => $habitacion_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => 'Pendiente',
            'precio_total' => $precio_total,
            'cupon_id' => $request->cupon_id
        ]);

        return view('reservas.confirmacionReservaHabitacion', compact('reserva', 'habitacion'));
    }

    public function formularioReservaRecepcionista($habitacion_id)
    {
        $regimenes = Regimen::all();
        $habitacion = Habitacion::findOrFail($habitacion_id);
        return view('reservas.formularioReservaRecepcionista', compact('habitacion', 'regimenes'));
    }

    public function reservarRecepcionista(Request $request, $habitacion_id)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'nombre_usuario' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $usuario = User::firstOrCreate(
            ['email' => $request->email], // Condición para verificar si existe
            [
                'nombre_usuario' => $request->nombre_usuario, // Nombre del usuario
                'email' => $request->email, // Correo electrónico
                'password' => bcrypt(Str::random(10)), // Generar una contraseña aleatoria
            ]
        );

        $habitacion = Habitacion::with('tipo')->findOrFail($habitacion_id);
        $dias = now()->parse($request->fecha_inicio)->diffInDays(now()->parse($request->fecha_fin));
        $precio_total = $dias * $habitacion->tipo->precio;

        $reserva = Reserva::create([
            'usuario_id' => $usuario->id,
            'regimen_id' => $request->regimen_id,
            'habitacion_id' => $habitacion_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => 'Pendiente',
            'precio_total' => $precio_total,
            'cupon_id' => $request->cupon_id
        ]);

        return view('reservas.confirmacionReservaHabitacionRecep', compact('reserva', 'habitacion'));
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
            'usuario_id' => $request->usuario,
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
            'nombre_usuario' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $usuario = User::firstOrCreate(
            ['email' => $request->email], // Condición para verificar si existe
            [
                'nombre_usuario' => $request->nombre_usuario, // Nombre del usuario
                'email' => $request->email, // Correo electrónico
                'password' => bcrypt(Str::random(10)), // Generar una contraseña aleatoria
            ]
        );

        $sala = Sala::with('tipoSala')->findOrFail($sala_id);
        $dias = now()->parse($request->fecha_inicio)->diffInDays(now()->parse($request->fecha_fin));
        $precio_total = $dias * $sala->tipoSala->precio;

        $reserva = Reserva::create([
            'usuario_id' => $usuario->id,
            'sala_id' => $sala->id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => 'Pendiente',
            'precio_total' => $precio_total,
        ]);

        return view('reservas.confirmacionReservaSalasRecep', compact('reserva', 'sala'));
    }

    public function mostrarConfirmacionReserva($id)
    {
        $reserva = Reserva::with(['habitacion', 'usuario'])->findOrFail($id);
        return view('reservas.confirmacionReservaHabitacion', compact('reserva'));
    }

    public function mostrarConfirmacionReservaSala($id)
    {
        $reserva = Reserva::with(['habitacion', 'usuario'])->findOrFail($id);
        return view('reservas.confirmacionReservaSalas', compact('reserva'));
    }
}
