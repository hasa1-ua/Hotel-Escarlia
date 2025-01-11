<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TipoSala;
use App\Models\Sala;

class SalaWebmasterController extends Controller{

    public function getTipoSala(){
        $tipossalas = TipoSala::all();
        return view('listas.SalaWebmaster', ['tipo_salas'=>$tipossalas]);
    }

    public function getSala(){
        $salas = Sala::all();
        return view('listas.SalaWebmaster', ['salas'=>$salas]);
    }

    public function deleteTipoSala($id){
        $tipossalas = TipoSala::idTipo($id);
        $tipossalas->eliminarTipoSala();
        return redirect('/Webmaster/TipoSalas');
    }

    public function editarTipoSala($id){
        $tipossalas = TipoSala::idTipo($id);
        return view('Editar.editarTipoSala', ['tipo_salas'=>$tipossalas]);
    }

    public function añadirTipoSala(){
        return view('Crear.crearTipoSala');
    }


    public function guardarTipoSala(Request $request){
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s]+$/u',
            'precio' => 'required|numeric',
            'aforo' => 'required|numeric',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = $request->file('imagen')->getClientOriginalName();
        $imagePath = 'imagenes/Salas/' . $imageName;

	    $tipossalas = new TipoSala();
	    $tipossalas->nombre = $request->nombre;
	    $tipossalas->precio = $request->precio;
	    $tipossalas->duracion = $request->aforo;
	    $tipossalas->descripcion = $request->descripcion;
        $tipossalas->img = $imagePath ?? null;
	    $tipossalas->save();

	    return redirect('/Webmaster/tiposala')->with('success', '¡Tipo de Sala creado exitosamente!');
    }


    public function actualizarTipoSala($id, Request $request){

        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s]+$/u',
            'precio' => 'required|numeric',
            'aforo' => 'required|numeric',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = $request->file('imagen')->getClientOriginalName();
        $imagePath = 'imagenes/Menu/' . $imageName;

        $tipossalas = TipoSala::idTipo($id);
	    $tipossalas->nombre = $request->nombre;
	    $tipossalas->precio = $request->precio;
	    $tipossalas->duracion = $request->aforo;
	    $tipossalas->descripcion = $request->descripcion;
        $tipossalas->img = $imagePath ?? null;
	    $tipossalas->save();
        return redirect('/Webmaster/tiposala');
    }

    
}

