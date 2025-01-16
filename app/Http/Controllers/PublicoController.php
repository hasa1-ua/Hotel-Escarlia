<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoHabitacion;
use App\Models\TipoSala;

class PublicoController extends Controller
{
    public function getTipoSala(){
        $tipossalas = TipoSala::all();
        return view('listas.listadoUsuarioNoRegSalas', ['tipo_salas'=>$tipossalas]);
    }

    public function getTipoHabitacion(){
        $tiposhabitaciones = TipoHabitacion::all();
        return view('listas.listadoHabitacionesUsuario', ['tipo_habitaciones'=>$tiposhabitaciones]);
    }

    public function getFotosPublico(){
        return view('extras/fotosPublico');
    }
}
