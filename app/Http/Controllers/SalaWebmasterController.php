<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TipoSala;
use App\Models\Sala;

class SalaWebmasterController extends Controller{

    public function getTipoSala(Request $request){
        // Obtén los tipos de sala
        $tipossalas = TipoSala::paginate(5, ['*'], 'tipos_pagina');

        $disponible = $request->get('disponible');
    
        // Si el filtro 'disponible' está presente, se aplica
        $salas = Sala::with('tipoSala')
                ->when($disponible !== null, function($query) use ($disponible) {
                    return $query->where('disponible', $disponible); // Convertir a entero
                })
                ->paginate(5, ['*'], 'salas_pagina');
    
        // Retorna la vista con ambas variables
        return view('listas.listadoWebmasterSalas', [
            'tipo_salas' => $tipossalas, // Variable para la primera tabla (tipo de sala)
            'salas' => $salas           // Variable para la segunda tabla (salas)
        ]);
    }

    // Tipo Sala

    public function deleteTipoSala($id){
        $tipossalas = TipoSala::idTipo($id);
        $tipossalas->eliminarTipoSala();
        return redirect('/Webmaster/salas-de-conferencia');
    }

    public function editarTipoSala($id){
        $tipossalas = TipoSala::idTipo($id);
        return view('editar.editarTipoSala', ['tipo_salas'=>$tipossalas]);
    }

    public function añadirTipoSala(){
        return view('crear.crearTipoSala');
    }


    public function guardarTipoSala(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'aforo' => 'required|numeric',
            'descripcion' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = $request->file('img')->getClientOriginalName();
        $imagePath = 'imagenes/TiposSalas/' . $imageName;

	    $tipossalas = new TipoSala();
	    $tipossalas->nombre = $request->nombre;
	    $tipossalas->precio = $request->precio;
	    $tipossalas->aforo = $request->aforo;
	    $tipossalas->descripcion = $request->descripcion;
        $tipossalas->img = $imagePath ?? null;
	    $tipossalas->save();

	    return redirect('/Webmaster/salas-de-conferencia')->with('success', '¡Tipo de Sala creado exitosamente!');
    }


    public function actualizarTipoSala($id, Request $request){

        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'aforo' => 'required|numeric',
            'descripcion' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $tipossalas = TipoSala::idTipo($id);

        if ($request->hasFile('img')) {
            $imageName = $request->file('img')->getClientOriginalName();
            $imagePath = 'imagenes/TiposSalas/' . $imageName;
    
            // Guardar la nueva ruta de la imagen
            $tipossalas->img = $imagePath;
    
            // Mover la imagen al almacenamiento (asegúrate de tener la carpeta creada)
            $request->file('img')->move(public_path('imagenes/TiposSalas'), $imageName);
        }
    
        
	    $tipossalas->nombre = $request->nombre;
	    $tipossalas->precio = $request->precio;
	    $tipossalas->aforo = $request->aforo;
	    $tipossalas->descripcion = $request->descripcion;
	    $tipossalas->save();
        return redirect('/Webmaster/salas-de-conferencia');
    }


    // Sala

    public function editarSala($id){
        $tipossalas = TipoSala::all();
        $salas = Sala::obtenerSalaporId($id);
        return view('editar.editarSala', ['salas'=>$salas, 'tipo_sala'=> $tipossalas]);
    }


    public function actualizarSala($id, Request $request){

        $request->validate([
            'nombre' => 'required|string|max:255',
            'disponible' => 'required|boolean',
        ]);

        $salas = Sala::obtenerSalaporId($id);
	    $salas->nombre = $request->nombre;
	    $salas->disponible = $request->disponible;
        $salas->tipo_sala_id = $request->tipo_sala_id;
	    $salas->save();
        return redirect('/Admin/salas-de-conferencia');
    }

    public function añadirSala(){
        $tipossalas = TipoSala::all();
        $salas = new Sala();
        return view('crear.crearSala', ['salas'=>$salas, 'tipo_sala'=> $tipossalas]);
    }


    public function guardarSala(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'disponible' => 'required|boolean',
        ]);


	    $salas = new Sala();
	    $salas->nombre = $request->nombre;
	    $salas->disponible = $request->disponible;
        $salas->tipo_sala_id = $request->tipo_sala_id;
	    $salas->save();
        return redirect('/Admin/salas-de-conferencia');
    }

    public function deleteSala($id){
        $salas = Sala::obtenerSalaporId($id);
        $salas->eliminarSala();
        return redirect('/Admin/salas-de-conferencia');
    }
    
}

