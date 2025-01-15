<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'precio_total',
    ];

    // Relaciones

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function regimen()
    {
        return $this->belongsTo(Regimen::class, 'regimen_id');
    }

    public function temporada()
    {
        return $this->belongsTo(Temporada::class, 'temporada_id');
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'sala_id');
    }

    public function cupon()
    {
        return $this->belongsTo(Cupon::class, 'cupon_id');
    }

    // Getters

    public function getId() {
        return $this->id;
    }

    public function getFechaInicio() {
        return $this->fecha_inicio;
    }

    public function getFechaFin() {
        return $this->fecha_fin;
    }

    public function getEstado() {
        return $this->estado ?? 'Pendiente';
    }

    public function getPrecioTotal() {
        return $this->precio_total  ?? 'Sin precio total';
    }

    // Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setFechaInicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function setFechaFin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setPrecioTotal($precio_total) {
        $this->precio_total = $precio_total;
    }

    // Métodos

    public function eliminarReserva(){
        $this->delete();
    }

    
}
