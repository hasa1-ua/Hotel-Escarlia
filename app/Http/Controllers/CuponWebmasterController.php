<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cupon;




class CuponWebmasterController extends Controller{

    public function getCupon(Request $request){

        // Para filtro estados = Confirmada, Pendiente (default), cancelada
        $utilizado = $request->get('utilizado');
    
        // Si el filtro 'estados' está presente, se aplica
        $cupones = Cupon::query()
                ->when($utilizado !== null, function($query) use ($utilizado) {
                    return $query->where('utilizado', $utilizado); 
                })->paginate(5, ['*'], 'cupon_pagina');
    
        // Retorna la vista con ambas variables
        return view('listas.listadoWebmasterReservas', [
            'cupones' => $cupones,
        ]);
    }

}

