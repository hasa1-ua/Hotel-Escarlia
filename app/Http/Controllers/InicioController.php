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

    public function Admin()
    {
        return view('homes/inicioAdmin');
    }
}
