<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'planta',
        'disponible',
    ];

    // Relaciones

    public function tipo()
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipo_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'recurso_id')->where('tipo_reserva', 'Habitación');
    }

    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getNumero()
    {
        return $this->numero ?? 'Sin número';
    }

    public function getPlanta()
    {
        return $this->planta ?? 'Sin planta';
    }

    public function getVistas()
    {
        return $this->vistas ?? '0';
    }

    public function getDisponible()
    {
        return $this->disponible ?? true;
    }

    // Setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function setPlanta($planta)
    {
        $this->planta = $planta;
    }

    public function setVistas($vistas)
    {
        $this->vistas = $vistas;
    }

    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;
    }

    // Métodos

    public function bloquear()
    {
        $this->disponible = false;
        $this->save();
    }

    public function desbloquear()
    {
        $this->disponible = true;
        $this->save();
    }
}
