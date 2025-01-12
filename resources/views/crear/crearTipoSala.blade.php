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

.button-1{
  margin-top: 20px;
  margin-left: 20px;
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

.form-group label[for="descripcion"] {
    margin-top: 20px; /* Ajusta este valor según necesites */
    display: block;
}

.custom-file-container {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    /* Input file invisible pero funcional */
    .custom-file-container input[type="file"] {
        position: absolute;
        opacity: 0;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    /* Botón personalizado */
    .custom-file-button {
        padding: 10px 20px;
        background-color:  #840705;
        color: #C3BB38;
        border: 1px solid #C3BB38;
        border-radius: 5px;
        cursor: pointer;
        font-size: 48px;
        text-align: center;
    }

    .custom-file-button:hover {
        background-color:rgb(84, 4, 3);
        cursor: pointer;
    }

</style>




@extends('layoutWebmaster')

@section('contenido')


<h3 class="titulo">Crear Tipo de Sala</h3>

<div class="container">
    <form method="POST" action="{{ route('tiposala.guardar') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="letras1" for="nombre">Nombre:</label>
            <input class="celda" style=" margin-left: 20px;" type="text" id="nombre" name="nombre" value="{{ 'nombre' }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="precio">Precio:</label>
            <input class="celda" style=" margin-left: 20px;" type="number" id="precio" name="precio" step="0.01" value="{{ 'precio' }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="aforo">Aforo:</label>
            <input class="celda" style=" margin-left: 20px;" type="number" id="aforo" name="aforo" value="{{ 'aforo' }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="descripcion">Descripción:</label>
            <textarea class="celda" id="descripcion" name="descripcion" style="width: 550px; height: 200px;"value>{{ 'descripcion' }}</textarea>
        </div>

        <div class="form-group">
            <label class="letras1" for="img">Imagen:</label>
            <div class="custom-file-container">
              <button type="button" style=" margin-left: 20px;"  class="custom-file-button">Subir Imagen</button>
              <input class="celda" type="file" id="img" name="img" class="hidden">
            </div>
        </div>

        <button type="submit" class="button-1">Crear</button>
    </form>
<div>



@endsection