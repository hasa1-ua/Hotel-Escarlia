<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\TipoHabitacion;
use App\Models\Foto;

class HabitacionesWebmasterController extends Controller
{
    public function listarHabitaciones(Request $request)  
    {
        $disponible = $request->get('disponible');

        $habitaciones = Habitacion::with('tipo')
                ->when($disponible !== null, function($query) use ($disponible) {
                    return $query->where('disponible', $disponible); // Convertir a entero
                })
                ->paginate(5, ['*'], 'habitacion_pagina');

        return view('listas.listadoHabitacionesWebmaster', compact('habitaciones'));
    }

    public function crearHabitacion()  
    {
        $tiposHabitacion = TipoHabitacion::all();
        $habitacion = new Habitacion();
        return view('crear.crearHabitacion', ['habitacion'=> $habitacion, 'tiposHabitacion'=> $tiposHabitacion]);
    }


    public function editarHabitacion($id) 
    {
        $habitacion = Habitacion::findOrFail($id);
        $tiposHabitacion = TipoHabitacion::all();
        return view('editar.editarHabitaciones', compact('habitacion', 'tiposHabitacion'));
    }


    public function guardarHabitacion(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer|unique:habitaciones,numero,',
            'planta' => 'required|integer',
            'vistas' => 'nullable|string',
            'disponible' => 'required|boolean',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $habitacion = new Habitacion();
	    $habitacion->numero = $request->numero;
	    $habitacion->disponible = $request->disponible;
        $habitacion->planta = $request->planta;
        $habitacion->vistas = $request->vistas;
        $habitacion->tipo_id = $request->tipo_id;
	    $habitacion->save();

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                // Guardar la imagen en storage/app/public/salas
                $nombreArchivo = time() . '_' . $imagen->getClientOriginalName();
                $rutaRelativa = 'imagenes/Habitaciones/' . $nombreArchivo;
                $imagen->move(public_path('imagenes/Habitaciones'), $nombreArchivo);
    
                // Crear una nueva entrada en la tabla fotos
                $habitacion->fotos()->create([
                    'url' => $rutaRelativa,
                ]);
            }
        }

        return redirect('/Webmaster/habitaciones')->with('success', 'Habitación creada');
    }

    public function actualizarHabitacion(Request $request, $id)
    {
        $request->validate([
            'numero' => 'required|integer|unique:habitaciones,numero,' . $id,
            'planta' => 'required|integer',
            'vistas' => 'nullable|string',
            'disponible' => 'required|boolean',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $habitacion = Habitacion::find($id);
	    $habitacion->numero = $request->numero;
	    $habitacion->disponible = $request->disponible;
        $habitacion->planta = $request->planta;
        $habitacion->vistas = $request->vistas;
        $habitacion->tipo_id = $request->tipo_id;
	    $habitacion->save();

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                // Guardar la imagen en storage/app/public/salas
                $nombreArchivo = time() . '_' . $imagen->getClientOriginalName();
                $rutaRelativa = 'imagenes/Habitaciones/' . $nombreArchivo;
                $imagen->move(public_path('imagenes/Habitaciones'), $nombreArchivo);
    
                // Crear una nueva entrada en la tabla fotos
                $habitacion->fotos()->create([
                    'url' => $rutaRelativa,
                ]);
            }
        }

        return redirect('/Webmaster/habitaciones');
    }

    public function deleteHabitacion($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $habitacion->delete();

        return redirect('/Webmaster/habitaciones')->with('success', 'Habitación eliminada ');
    }

    public function deleteImagen($id) {
        $foto = Foto::findOrFail($id);
    
        // Eliminar el archivo físico si existe
        $ruta = public_path($foto->url);
        if (file_exists($ruta)) {
            unlink($ruta);
        }
    
        // Eliminar la entrada de la base de datos
        $foto->delete();
    
        return redirect()->back()->with('success', 'Imagen eliminada correctamente.');
    }
}
