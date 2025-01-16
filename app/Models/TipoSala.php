<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSala extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'aforo',
        'precio',
        'img'
    ];

    // Relaciones

    public function salas()
    {
        return $this->hasMany(Sala::class, 'tipo_sala_id');
    }

    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre ?? 'Sin nombre';
    }

    public function getDescripcion()
    {
        return $this->descripcion ?? 'Sin descripción';
    }

    public function getAforo(){
        return $this->aforo ?? 0;
    }

    public function getPrecio(){
        return $this->precio ?? 0.0;
    }

    public function getImagen(){
        return $this->img;
    }

    // Setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setAforo($aforo){
        $this->aforo = $aforo;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function setImagen($img){
        $this->img = $img;
    }


    //Metodos CRUD

    public static function idTipo($id){
        return self::find($id);
    }

    public function eliminarTipoSala(){
        $this->delete();
    }

    public static function deleteWithId($id){
        TipoSala::find($id)->delete();
    }



    
}
