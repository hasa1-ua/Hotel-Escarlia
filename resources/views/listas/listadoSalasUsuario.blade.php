<style>
  
.titulo {
  color: #C3BB38;
  font-family: "Yellowtail";
  font-weight: 300;
  font-size: 72px;
  text-align: center;
}


.casilla {
  width: 1420px;
  height: 413px;
  padding: 8px 8px 8px 8px;
  background: #000000;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  cursor: pointer;
}

.nombre {
  width: 459px;
  height: 20px;
  color: #C3BB38;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 60px;
  line-height: 60px;
  margin-top: 30px;
}

.image{
  display: inline-block; /* Permite que esté en línea con la imagen */
  vertical-align: middle;
  align-items: left;
  margin-top: 50px;
  margin-left: 20px;
}

img{
  width: 450px;
  height: 300px;
}

.label1{
  margin-left: 50px;
  display: inline-block; /* Permite que esté en línea con la imagen */
  vertical-align: middle;
}

.letras1 {
  width: 459px;
  height: 20px;
  color: #C3BB38;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 48px;
}

.label2{
  display: inline-block; /* Permite que esté en línea con la imagen */
  vertical-align: right;
  margin-left: -50px;
  
}

.descripcion {
  width: 450px;
  height: 20px;
  color: #C3BB38;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 42px;
}

</style>


@extends('layoutUsuario')

@section('contenido')


<h3 class="titulo">Salas</h3>

@foreach($tipo_salas as $tiposala)

    <div class="casilla"  onclick="window.location.href='/Usuario/salas-de-conferencia/{{$tiposala->id}}';">
        <div class="image">
          <img src="{{ asset($tiposala->img) }}">
        </div>
        <div class="label1">
          <h4 class="nombre"> {{ $tiposala->nombre}} </h4>
          <div style="margin-top: 150px;">
            <h5 class="letras1">
                Plazas: 
                {{$tiposala->getAforo()}}
            </h5>
            <h5 class="letras1" style="width: 300px; margin-top: -30px">
              Precio:
              {{number_format($tiposala->getPrecio(), 2)}}€
              Por noche
            </h5> 
          </div>
          
        </div>
        <div class="label2"> 
            <p class="descripcion">{{$tiposala->getDescripcion()}}</p>
        </div>
    </div>
@endforeach
@endsection