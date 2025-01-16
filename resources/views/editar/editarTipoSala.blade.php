<style>

.titulo {
  color: #C3BB38;
  font-family: "Yellowtail";
  font-weight: 300;
  font-size: 72px;
  text-align: center;
}


.container{
  width: auto;
  height: auto;
  padding: 8px 8px 50px 8px;
  background: #000000;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  border-radius: 15px;
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
  margin-top: 50px;
  margin-left: 600px;
  align-items: left;
  display: inline;
  border-radius: 15px;
}

button {
  width: 363px;
  height: 73px;
  background: #840705;
  color: #C3BB38;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 60px;
  margin-left: 20px;
  border-radius: 15px;
}

.button1{
  margin-top: 40px;
  border-radius: 15px;
}


.celda{
  padding: 10px;
  font-size: 48px; 
  font-family: "Solitreo";
  border: 1px solid #C3BB38; /* Borde del input */
  border-radius: 15px;
  background-color: #840705; /* Fondo rojo claro */
  color: #C3BB38; /* Texto en rojo oscuro */
  width: 300px;
  height: 70px;
}

.label{
  margin-top: -480px;
}

.form-group label[for="descripcion"] {
    margin-top: 20px; /* Ajusta este valor según necesites */
    display: block;
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
        border-radius: 15px;
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
        border-radius: 15px;
    }

    .custom-file-button:hover {
        background-color:rgb(84, 4, 3);
        cursor: pointer;
    }

    .text-danger{
        color:rgb(165, 0, 0);
        font-family: "Yellowtail";
        font-size: 30px;
    }

    .separation {
    text-align: left;
    margin-top: 30px;
    display: flex;
}

</style>


@extends('layoutWebmaster')

@section('contenido')
    <h3 class="titulo">Editar Tipo de Sala</h3>

    <div class="container">

    <img src="{{ asset($tipo_salas->img) }}" alt="Imagen actual" width="100">

    <div class="label">

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <form action="{{ route('tiposala.actualizar', $tipo_salas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Método PUT para actualizar -->
        
        <div class="form-group">
       
            <label class="letras1" for="nombre">Nombre*:</label>
            <input class="celda" style=" margin-left: 20px;"  type="text" id="nombre" name="nombre" value="{{ $tipo_salas->nombre }}">
            @error('nombre')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

        <div class="form-group">
            <label class="letras1" for="precio">Precio*:</label>
            <input class="celda" style=" margin-left: 20px;"  type="number" id="precio" name="precio" step="0.01" value="{{ $tipo_salas->precio }}">
            @error('precio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

        <div class="form-group">
            <label class="letras1" for="aforo">Aforo*:</label>
            <input class="celda" style=" margin-left: 20px;"  type="number" id="aforo" name="aforo" value="{{ $tipo_salas->aforo }}">
            @error('aforo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="letras1" for="descripcion">Descripción:</label>
            <textarea class="celda" id="descripcion" name="descripcion" style="width: 550px; height: 200px;" value>{{ $tipo_salas->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label class="letras1" for="img">Imagen*:</label>
            <div class="custom-file-container">
              <button type="button" style=" margin-left: 20px;"  class="custom-file-button">Subir Imagen</button>
              <input class="celda" type="file" id="img" name="img" class="hidden">
            </div>
            @error('img')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class= "separation">
            <button class="button1" type="submit">Editar</button>
            <button class="button1" type="button" onclick="window.location.href='/Webmaster/salas-de-conferencia';">Volver</button>
        </div>
    </form>
    </div>
    </div>
@endsection
