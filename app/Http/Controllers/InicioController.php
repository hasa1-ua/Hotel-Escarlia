<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function Usuario()
    {
        return view('homes/inicioUsuario');
    }

    public function Webmaster()
    {
        return view('homes/inicioWebmaster');
    }

    public function Recepcionista()
    {
        return view('homes/inicioRecepcionista');
    }

    public function Publico() //ESCAPARATE
    {
        return view('homes/inicioPublico');
    }
}
