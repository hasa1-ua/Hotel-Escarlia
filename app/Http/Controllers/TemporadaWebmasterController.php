<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Temporada;


class TemporadaWebmasterController extends Controller{

    public function getTemporada(){
        // Si el filtro 'utilizado' está presente, se aplica
        $temporadas = Temporada::query()->paginate(5, ['*'], 'temporada_pagina');
    
        // Retorna la vista con ambas variables
        return view('listas.listadoWebmasterTemporadas', ['temporadas' => $temporadas]);
    }

    public function deleteTemporada($id){
        $temporadas = Temporada::find($id);
        $temporadas->eliminarTemporada();
        return redirect('/Webmaster/menu-reservas/temporadas');
    }

    public function editarTemporada($id){
        $temporadas = Temporada::find($id);
        return view('editar.editarTemporada', 
        [ 'temporadas' => $temporadas]);
    }

    public function actualizarTemporada($id, Request $request)
    {
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date',
        'multiplicador' => 'required|numeric|min:0',
    ]);

    $temporadas = Temporada::find($id);


    $temporadas->nombre = $request->nombre;
    $temporadas->fecha_inicio = $request->fecha_inicio;
    $temporadas->fecha_fin = $request->fecha_fin;
    $temporadas->multiplicador = $request->multiplicador;
    $temporadas->save();

    // Redirigir con mensaje de éxito
    return redirect('/Webmaster/menu-reservas/temporadas')
        ->with('success', 'Temporada actualizada correctamente.');
    }


    public function añadirTemporada(){
        $temporadas = new Temporada();
        return view('crear.crearTemporada', 
        [ 'temporadas' => $temporadas]);
        
    }


    public function guardarTemporada(Request $request){
     // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date',
        'multiplicador' => 'required|numeric|min:0',
    ]);

    $temporadas = new Temporada();


    $temporadas->nombre = $request->nombre;
    $temporadas->fecha_inicio = $request->fecha_inicio;
    $temporadas->fecha_fin = $request->fecha_fin;
    $temporadas->multiplicador = $request->multiplicador;
    $temporadas->save();

    // Redirigir con mensaje de éxito
    return redirect('/Webmaster/menu-reservas/temporadas')
        ->with('success', 'Temporada guardada correctamente.');
    }
    

}

