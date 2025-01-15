<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;

class ReservasRecepcionistaController extends Controller
{
    public function getReservas()
    {
        $reservas = Reserva::paginate(4, ['*'], 'reserva_pagina');
        return view('listas.listadoReservasRecepcionista' , ['reservas' => $reservas]);
    }

    public function crear(){
        $salas = Sala::all();
        $habitaciones = Habitacion::all();
        $usuarios = User::all();
        return view('crear.crearReservaRecepcionista', ['salas' => $salas, 'habitaciones' => $habitaciones, 'usuarios' => $usuarios]);
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|string',
            'precio_total' => 'required|numeric',
            'usuario_id' => 'required|exists:users,id',
            'habitacion_id' => 'nullable|exists:habitaciones,id',
            'sala_id' => 'nullable|exists:salas,id',
        ]);

        // Validación personalizada: mínimo una opción, pero no ambas
        if (!$request->habitacion_id && !$request->sala_id) {
            return back()
                ->withErrors(['general' => 'Debe seleccionar al menos una habitación o una sala.']);
        }

        if ($request->habitacion_id && $request->sala_id) {
            return back()
                ->withErrors(['general' => 'No puede seleccionar una habitación y una sala al mismo tiempo.']);
        }

        $reserva = new Reserva();
        $reserva->fecha_inicio = $request->fecha_inicio;
        $reserva->fecha_fin = $request->fecha_fin;
        $reserva->estado = $request->estado;
        $reserva->precio_total = $request->precio_total;
        $reserva->usuario_id = $request->usuario_id;
        $reserva->habitacion_id = $request->habitacion_id;
        $reserva->sala_id = $request->sala_id;
        $reserva->save();
        return redirect('/Recepcionista/reservas');
    }

    public function editar($id){
        $reserva = Reserva::find($id);
        $salas = Sala::all();
        $habitaciones = Habitacion::all();
        $usuarios = User::all();
        return view('editar.editarReservaRecepcionista', ['reserva' => $reserva, 'salas' => $salas, 'habitaciones' => $habitaciones, 'usuarios' => $usuarios]);
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|string',
            'precio_total' => 'required|numeric',
            'usuario_id' => 'required|exists:users,id',
            'habitacion_id' => 'nullable|exists:habitaciones,id',
            'sala_id' => 'nullable|exists:salas,id',
        ]);

        // Validación personalizada: mínimo una opción, pero no ambas
        if (!$request->habitacion_id && !$request->sala_id) {
            return back()
                ->withErrors(['general' => 'Debe seleccionar al menos una habitación o una sala.']);
        }

        if ($request->habitacion_id && $request->sala_id) {
            return back()
                ->withErrors(['general' => 'No puede seleccionar una habitación y una sala al mismo tiempo.']);
        }

        $reserva = Reserva::find($id);
        $reserva->fecha_inicio = $request->fecha_inicio;
        $reserva->fecha_fin = $request->fecha_fin;
        $reserva->estado = $request->estado;
        $reserva->precio_total = $request->precio_total;
        $reserva->usuario_id = $request->usuario_id;
        $reserva->habitacion_id = $request->habitacion_id;
        $reserva->sala_id = $request->sala_id;
        $reserva->save();
        return redirect('/Recepcionista/reservas');
    }

    public function borrarReserva($id)
    {
        $reserva = Reserva::find($id);
        $reserva->delete();
        return redirect('/Recepcionista/reservas');
    }
}
