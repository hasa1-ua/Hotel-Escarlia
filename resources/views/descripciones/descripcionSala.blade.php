<style>

.container{
  width: 1420px;
  height: 849px;
  padding: 8px 8px 8px 8px;
  background: #000000;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
}

.letras1 {
  width: 479px;
  height: 68px;
  color: #C3BB38;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 48px;
  text-align: left;
}


</style>



@extends('layoutUsuario')
@section('contenido')


<div class="container">
    <div class="label1">
        <h3 class="letras1">{{$sala->tipoSala->nombre}}</h3>
        <h3 class="letras1">{{$sala->tipoSala->descripcion}}</h3>
        <h3 class="letras1">Precio: {{$sala->tipoSala->precio}}€</h3>
    </div>

    <div class="label2">
        <h3 class="letras1">Aforo: {{$sala->tipoSala->aforo}}</h3>
        @if ($sala->disponible)
            <h3 class="letras1">Disponible</h3>
        @else
            <h3 class="letras1">No disponible</h3>
        @endif
    </div>
    

<div>



@endsection