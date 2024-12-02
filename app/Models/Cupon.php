<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descuento',
        'fecha_expiracion',
    ];

    // Relaciones

    public function reservas()
    {
        return $this->belongsToMany(Reserva::class, 'cupon_reserva');
    }

    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getCodigo()
    {
        return $this->codigo ?? 'Sin código';
    }

    public function getDescuento()
    {
        return $this->descuento ?? 0;
    }

    public function getFechaExpiracion()
    {
        return $this->fecha_expiracion ?? 'Sin fecha de expiración';
    }

    // Setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }

    public function setFechaExpiracion($fecha_expiracion)
    {
        $this->fecha_expiracion = $fecha_expiracion;
    }

    // Métodos

    public function obtenerDescuento($monto)
    {
        return $monto - ($monto * $this->getDescuento() / 100);
    }
    
}
