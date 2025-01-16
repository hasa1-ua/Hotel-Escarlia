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
  margin-top: 40px;
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
        padding: 10px 10px;
        background-color:  #840705;
        color: #C3BB38;
        border: 1px solid #C3BB38;
        border-radius: 5px;
        cursor: pointer;
        font-size: 48px;
        text-align: center;
        font-family: "Solitreo";
        width: 363px;
        height: 73px;
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


<h3 class="titulo">Crear Sala</h3>

<div class="container">
    <form method="POST" action="{{ route('sala.guardar') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="letras1" for="nombre">Nombre*:</label>
            <input class="celda" type="text" id="nombre" name="nombre" value="{{ $salas->nombre }}">
            @error('nombre')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="letras1" for="precio">Disponible*:</label>
            <select class="celda" id="disponible" name="disponible">
                <option value="1" {{ $salas->disponible ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$salas->disponible ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="aforo">Tipo Sala*:</label>
            <select class="celda" id="tipo_sala_id" name="tipo_sala_id">
                <option value="">Seleccione un tipo</option>
                @foreach($tipo_sala as $tipo)
                <option value="{{ $tipo->id }}" {{ $salas->tipo_sala_id == $tipo->id ? 'selected' : '' }}>
                    {{ $tipo->nombre }}
                </option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="imagenes" style="display: block;">Imágenes de la Sala*:</label>
            <div class="custom-file-container" style="display: block;">
              <button type="button" style=" margin-left: 20px;" class="custom-file-button">Subir Imagen</button>
              <input style="margin-top: 10px;" class="celda" type="file" id="imagenes" name="imagenes[]" multiple accept="image/*" onchange="mostrarNombres()">
              <div id="lista-imagenes" style="margin-top: 10px; color: #C3BB38; font-family: 'Solitreo'; font-size: 20px;"></div>
              @error('imagenes')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
        </div>

        <div class= "separation">
            <button class="button1" type="submit">Crear</button>
            <button class="button1" type="button" onclick="window.location.href='/Webmaster/salas-de-conferencia';">Volver</button>
        </div>
    </form>
<div>

<script>
 function mostrarNombres() {
    const input = document.getElementById('imagenes');
    const lista = document.getElementById('lista-imagenes');
    
    // Limpiar el contenido actual
    lista.innerHTML = '';

    // Obtener los archivos seleccionados
    const archivos = input.files;

    // Crear una lista de nombres
    if (archivos.length > 0) {
        const ul = document.createElement('ul');
        for (const archivo of archivos) {
            const li = document.createElement('li');
            li.textContent = archivo.name; // Mostrar solo el nombre del archivo
            ul.appendChild(li);
        }
        lista.appendChild(ul);
    } else {
        lista.textContent = 'No se ha seleccionado ninguna imagen.';
    }
}


</script>

@endsection