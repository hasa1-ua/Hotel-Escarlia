<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Regimen;
use App\Models\Cupon;
use App\Models\Temporada;
use App\Models\Sala;
use App\Models\Habitacion;

use App\Models\TipoSala;

use App\Models\Foto;



class ReservaWebmasterController extends Controller{

    public function getReserva(Request $request){

        // Para filtro estados = Confirmada, Pendiente (default), cancelada
        $estado = $request->get('estado');
    
        // Si el filtro 'estados' está presente, se aplica
        $reservas = Reserva::query()
                ->when($estado !== null, function($query) use ($estado) {
                    return $query->where('estado', $estado); 
                })->with(['usuario', 'regimen', 'habitacion', 'sala', 'temporada', 'cupon'])
                ->paginate(5, ['*'], 'reserva_pagina');
    
        // Retorna la vista con ambas variables
        return view('listas.listadoWebmasterReservas', [
            'reservas' => $reservas,
        ]);
    }

    public function editarReserva($id){
        $reservas = Reserva::findOrFail($id);
        $usuarios = User::all();
        $regimen = Regimen::all();
        $cupon = Cupon::all();
        $temporada = Temporada::all();
        $habitacion = Habitacion::all();
        $sala = Sala::all();

        return view('editar.editarReserva', 
        ['reservas'=>$reservas, 
        'usuarios'=>$usuarios,
        'regimen'=>$regimen,
        'cupon'=>$cupon,
        'temporada'=>$temporada,
        'habitacion'=>$habitacion,
        'sala'=>$sala,
        ]);
    }

    public function actualizarReserva($id, Request $request)
    {
    // Validar los datos del formulario
    $request->validate([
        'fecha_inicio' => 'required|date|after_or_equal:today',
        'fecha_fin' => 'required|date|after:fecha_inicio',
        'estado' => 'required|string|max:255',
        'precio_total' => 'required|numeric|min:0',
        'usuario_id' => 'required|exists:users,id',  // Asegúrate de que este campo esté validado
        'habitacion_id' => 'nullable|exists:habitaciones,id',
        'sala_id' => 'nullable|exists:salas,id',
        'cupon_reserva' => 'nullable|exists:cupones,id',  // Verifica también este campo
        'temporada_id' => 'nullable|exists:temporadas,id',  // Verifica este campo también
        'regimen_id' => 'nullable|exists:regimenes,id', // Y este
    ]);



    // Obtener la reserva por ID
    $reserva = Reserva::find($id);

    // Actualizar los campos de la reserva
    $reserva->fecha_inicio = $request->fecha_inicio;
    $reserva->fecha_fin = $request->fecha_fin;
    $reserva->estado = $request->estado;
    $reserva->precio_total = $request->precio_total;
    $reserva->usuario_id = $request->usuario_id;
    $reserva->habitacion_id = $request->habitacion_id;
    $reserva->sala_id = $request->sala_id;
    $reserva->cupon_reserva = $request->cupon_reserva;
    $reserva->temporada_id = $request->temporada_id;
    $reserva->regimen_id = $request->regimen_id;
    $reserva->save();

    // Redirigir con mensaje de éxito
    return redirect('/Webmaster/reservas')
        ->with('success', 'Reserva actualizada correctamente.');
    }

    public function deleteReserva($id){
        $reservas = Reserva::find($id);
        $reservas->eliminarReserva();
        return redirect('/Webmaster/reservas');
    }


    public function añadirReserva(){
        $reservas = new Reserva();
        $usuarios = User::all();
        $regimen = Regimen::all();
        $cupon = Cupon::all();
        $temporada = Temporada::all();
        $habitacion = Habitacion::all();
        $sala = Sala::all();
        return view('crear.crearReserva', 
        ['reservas'=>$reservas, 
        'usuarios'=>$usuarios,
        'regimen'=>$regimen,
        'cupon'=>$cupon,
        'temporada'=>$temporada,
        'habitacion'=>$habitacion,
        'sala'=>$sala,
        ]);
    }


    public function guardarReserva(Request $request){
        $request->validate([
            'fecha_inicio' => 'required|date|after_or_equal:today',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'estado' => 'required|string|max:255',
            'precio_total' => 'required|numeric|min:0',
            'usuario_id' => 'required|exists:users,id',  // Asegúrate de que este campo esté validado
            'habitacion_id' => 'nullable|exists:habitaciones,id',
            'sala_id' => 'nullable|exists:salas,id',
            'cupon_reserva' => 'nullable|exists:cupones,id',  // Verifica también este campo
            'temporada_id' => 'nullable|exists:temporadas,id',  // Verifica este campo también
            'regimen_id' => 'nullable|exists:regimenes,id', // Y este
        ]);
    
    
    
        // Obtener la reserva por ID
        $reserva = new Reserva();
    
        // Actualizar los campos de la reserva
        $reserva->fecha_inicio = $request->fecha_inicio;
        $reserva->fecha_fin = $request->fecha_fin;
        $reserva->estado = $request->estado;
        $reserva->precio_total = $request->precio_total;
        $reserva->usuario_id = $request->usuario_id;
        $reserva->habitacion_id = $request->habitacion_id;
        $reserva->sala_id = $request->sala_id;
        $reserva->cupon_reserva = $request->cupon_reserva;
        $reserva->temporada_id = $request->temporada_id;
        $reserva->regimen_id = $request->regimen_id;
        $reserva->save();
    
        // Redirigir con mensaje de éxito
        return redirect('/Webmaster/reservas')
            ->with('success', 'Reserva actualizada correctamente.');
    }
    
}

