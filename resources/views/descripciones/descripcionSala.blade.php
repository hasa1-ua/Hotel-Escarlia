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

.label1{
  margin-left: 50px;
  margin-top: -420px;
  display: inline-block; /* Permite que esté en línea con la imagen */
  vertical-align: middle;
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

img{
  width: 736px;
  height: 457px;
  margin-top: 20px;
  margin-left: 20px;
}

.label2{
    margin-top: -50px;
    margin-left: 20px;
}

button {
  width: 363px;
  height: 73px;
  background: #840705;
  color: #C3BB38;
  border-color: #F4EB49;
  border-width: 1px;
  border-style: solid;
  border-radius: 3px 3px 3px 3px;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 60px;
  text-align: center;
  float: right;
  margin-right: 150px;
  margin-top: -150px;
}


</style>



@extends('layoutUsuario')
@section('contenido')


<div class="container">
    <img src="{{ asset($sala->tiposala->img) }}">
    <div class="label1">
        <h3 class="letras1">{{$sala->nombre}}</h3>
        <h3 class="letras1">{{$sala->tipoSala->descripcion}}</h3>
        <h3 class="letras1" style="margin-top: 240px;">Precio: {{$sala->tipoSala->precio}}€</h3>
    </div>

    <div class="label2">
        <h3 class="letras1">Aforo: {{$sala->tipoSala->aforo}}</h3>
        @if ($sala->disponible)
            <h3 class="letras1">Disponible</h3>
        @else
            <h3 class="letras1">No disponible</h3>
        @endif
        <button onclick="window.location.href='/'">Reservar</button>
    </div>

    
    

<div>



@endsection