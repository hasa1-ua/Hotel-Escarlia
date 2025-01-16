<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function Usuario()
    {
        $user = Auth::user();
        return view('Homes.inicioUsuario', ['user' => $user]);
    }

    public function Webmaster()
    {
        return view('homes/inicioWebmaster');
    }

    public function Recepcionista()
    {
        $user = Auth::user();
        return view('Homes.inicioRecepcionista', ['user' => $user]);
    }

    public function Publico() //ESCAPARATE
    {
        $user = Auth::user();
        return view('Homes.inicioPublico', ['user' => $user]);
    }
}
