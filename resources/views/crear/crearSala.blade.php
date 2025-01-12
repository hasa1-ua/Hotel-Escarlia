<style>

.titulo {
  color: #C3BB38;
  font-family: "Yellowtail";
  font-weight: 300;
  font-size: 72px;
  text-align: center;
}


.container{
  margin-top: -20px;
  margin-left: -10px;
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
  white-space: nowrap;
}

img{
  width: 736px;
  height: 457px;
  margin-top: -400px;
  margin-left: 600px;
  align-items: left;
}



button {
  width: 363px;
  height: 73px;
  background: #840705;
  color: #C3BB38;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  border-radius: 3px 3px 3px 3px;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 60px;
  
}

.button1{
  margin-top: 20px;
}



.celda{
    padding: 10px;
    font-size: 48px; 
    font-family: "Solitreo";
    border: 1px solid #C3BB38; /* Borde del input */
    border-radius: 5px;
    background-color: #840705; /* Fondo rojo claro */
    color: #C3BB38; /* Texto en rojo oscuro */
    width: 300px;
    height: 70px;
}

.celda:focus{
    outline: none;
    border-color: #840705; /* Borde rojo al hacer foco */
    box-shadow: 0 0 5px rgba(132, 7, 5, 0.5); /* Sombra cuando se hace foco */
}

.form-group{
    margin-top: 20px;
    margin-left: 20px;
}

</style>




@extends('layoutWebmaster')

@section('contenido')


<h3 class="titulo">Crear Sala</h3>

<div class="container">
    <form method="POST" action="{{ route('sala.guardar') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="letras1" for="nombre">Nombre:</label>
            <input class="celda" type="text" id="nombre" name="nombre" value="{{ $salas->nombre }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="precio">Disponible:</label>
            <select class="celda" id="disponible" name="disponible">
                <option value="1" {{ $salas->disponible ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$salas->disponible ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="aforo">Tipo Sala:</label>
            <select class="celda" id="tipo_sala_id" name="tipo_sala_id">
                <option value="">Seleccione un tipo</option>
                @foreach($tipo_sala as $tipo)
                <option value="{{ $tipo->id }}" {{ $salas->tipo_sala_id == $tipo->id ? 'selected' : '' }}>
                    {{ $tipo->nombre }}
                </option>
            @endforeach
            </select>
        </div>

        <button type="submit" class="button-1">Crear</button>
    </form>
<div>



@endsection