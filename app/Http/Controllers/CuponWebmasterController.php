<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cupon;




class CuponWebmasterController extends Controller{

    public function getCupon(Request $request){

        // Para filtro utilizado = utilizado y no utilizado
        $utilizado = $request->get('utilizado');
    
        // Si el filtro 'utilizado' está presente, se aplica
        $cupones = Cupon::query()
                ->when($utilizado !== null, function($query) use ($utilizado) {
                    return $query->where('utilizado', $utilizado); 
                })->paginate(5, ['*'], 'cupon_pagina');
    
        // Retorna la vista con ambas variables
        return view('listas.listadoWebmasterCupones', [
            'cupones' => $cupones,
        ]);
    }

    public function deleteCupon($id){
        $cupones = Cupon::find($id);
        $cupones->eliminarCupon();
        return redirect('/Webmaster/menu-reservas/cupones');
    }

    public function editarCupon($id){
        $cupones = Cupon::find($id);
        return view('editar.editarCupon', 
        [ 'cupones' => $cupones]);
    }

    public function actualizarCupon($id, Request $request)
    {
    // Validar los datos del formulario
    $request->validate([
        'utilizado' => 'required|boolean',
        'codigo' => 'required|string|max:255',
        'fecha_expiracion' => 'required|date',
        'descuento' => 'required|numeric|min:0',
    ]);

    // Obtener la reserva por ID
    $cupones = Cupon::find($id);

    // Actualizar los campos de la reserva
    $cupones->utilizado = $request->utilizado;
    $cupones->codigo = $request->codigo;
    $cupones->fecha_expiracion = $request->fecha_expiracion;
    $cupones->descuento = $request->descuento;
    $cupones->save();

    // Redirigir con mensaje de éxito
    return redirect('/Webmaster/menu-reservas/cupones')
        ->with('success', 'Cupon actualizado correctamente.');
    }


    public function añadirCupon(){
        $cupones = new Cupon();
        return view('crear.crearCupon', 
        [ 'cupones' => $cupones]);
        
    }


    public function guardarCupon(Request $request){
        // Validar los datos del formulario
    $request->validate([
        'utilizado' => 'required|boolean',
        'codigo' => 'required|string|max:255',
        'fecha_expiracion' => 'required|date',
        'descuento' => 'required|numeric|min:0',
    ]);

    // Obtener la reserva por ID
    $cupones = new Cupon();

    // Actualizar los campos de la reserva
    $cupones->utilizado = $request->utilizado;
    $cupones->codigo = $request->codigo;
    $cupones->fecha_expiracion = $request->fecha_expiracion;
    $cupones->descuento = $request->descuento;
    $cupones->save();

    // Redirigir con mensaje de éxito
    return redirect('/Webmaster/menu-reservas/cupones')
        ->with('success', 'Cupon guardado correctamente.');
    }
    

}

