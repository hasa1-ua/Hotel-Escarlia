<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExtrasUsuarioController extends Controller
{
    public function getFotos(){
        return view('extras/fotos');
    }
}
