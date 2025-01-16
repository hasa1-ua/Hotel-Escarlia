<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;

class HabitacionesUsuarioController extends Controller
{
    public function getTipoHabitacion(){
        $tiposhabitaciones = TipoHabitacion::all();
        return view('listas.listadoHabitacionesUsuario', ['tipo_habitaciones'=>$tiposhabitaciones]);
    }
}
