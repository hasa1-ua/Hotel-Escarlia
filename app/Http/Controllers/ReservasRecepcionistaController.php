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

    public function borrarReserva($id)
    {
        $reserva = Reserva::find($id);
        $reserva->delete();
        return redirect('/Recepcionista/reservas');
    }
}
