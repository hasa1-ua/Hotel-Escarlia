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


@extends('layoutAdmin')

@section('contenido')
    <h3 class="titulo">Editar Tipo de Sala</h3>

    <div class="container">

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('tiposala.actualizar', $tipo_salas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Método PUT para actualizar -->
        
        <div class="form-group">
            <label class="letras1" for="nombre">Nombre:</label>
            <input class="celda" type="text" id="nombre" name="nombre" value="{{ $tipo_salas->nombre }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="precio">Precio:</label>
            <input class="celda" type="number" id="precio" name="precio" step="0.01" value="{{ $tipo_salas->precio }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="aforo">Aforo:</label>
            <input class="celda" type="number" id="aforo" name="aforo" value="{{ $tipo_salas->aforo }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="descripcion">Descripción:</label>
            <textarea class="celda" id="descripcion" name="descripcion" value>{{ $tipo_salas->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label class="letras1" for="imagen">Imagen:</label>
            <input class="celda" type="file" id="imagen" name="imagen">
            @if($tipo_salas->img)
                <img src="{{ asset($tipo_salas->img) }}" alt="Imagen actual" width="100">
            @endif
        </div>

        <button class="button1" type="submit">Editar</button>
    </form>
    </div>
@endsection
