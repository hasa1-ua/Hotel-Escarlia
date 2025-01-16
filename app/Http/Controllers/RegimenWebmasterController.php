<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Regimen;


use App\Models\Temporada;






class RegimenWebmasterController extends Controller{

    public function getRegimen(){
        // Si el filtro 'utilizado' está presente, se aplica
        $regimenes = Regimen::query()->paginate(5, ['*'], 'regimenes_pagina');
    
        // Retorna la vista con ambas variables
        return view('listas.listadoWebmasterRegimenes', ['regimenes' => $regimenes]);
    }

    public function deleteRegimen($id){
        $regimenes = Regimen::find($id);
        $regimenes->eliminarRegimen();
        return redirect('/Webmaster/menu-reservas/regimenes');
    }

    public function editarRegimen($id){
        $regimenes = Regimen::all();
        $regimen = Regimen::find($id);
        return view('editar.editarRegimen', 
        [ 'regimenes' => $regimenes,
          'regimen' => $regimen]);
    }

    public function actualizarRegimen($id, Request $request)
    {
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric|min:0',
    ]);

    $regimenes = Regimen::find($id);


    $regimenes->nombre = $request->nombre;
    $regimenes->precio = $request->precio;
    $regimenes->save();

    // Redirigir con mensaje de éxito
    return redirect('/Webmaster/menu-reservas/regimenes')
        ->with('success', 'Regimen actualizado correctamente.');
    }


    public function añadirRegimen(){
        $regimen = new Regimen();
        $regimenes = Regimen::all();
        return view('crear.crearRegimen', 
        [ 'regimenes' => $regimenes,
          'regimen' => $regimen]);
    }


    public function guardarRegimen(Request $request){
        // Validar los datos del formulario
        $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric|min:0',
        ]);

        $regimenes = new Regimen();


        $regimenes->nombre = $request->nombre;
        $regimenes->precio = $request->precio;
        $regimenes->save();

        return redirect('/Webmaster/menu-reservas/regimenes')
            ->with('success', 'Regimenes guardada correctamente.');
    }
    

}

