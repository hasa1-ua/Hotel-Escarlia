@extends('layoutWebmaster')

@section('contenido')

<style>
.titulo {
  color: #C3BB38;
  font-family: "Yellowtail";
  font-weight: 300;
  font-size: 72px;
  text-align: center;
}

.container {
  margin-top: -20px;
  margin-left: -10px;
  width: 1420px;
  height: 849px;
  padding: 8px;
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

img {
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
  border-radius: 3px;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 60px;
}

.button-1 {
  margin-top: 20px;
  margin-left: 20px;
}

.celda {
  padding: 10px;
  font-size: 48px;
  font-family: "Solitreo";
  border: 1px solid #C3BB38;
  border-radius: 5px;
  background-color: #840705;
  color: #C3BB38;
  width: 300px;
  height: 70px;
}

.celda:focus {
  outline: none;
  border-color: #840705;
  box-shadow: 0 0 5px rgba(132, 7, 5, 0.5);
}

.form-group {
  margin-top: 20px;
  margin-left: 20px;
}

.custom-file-container {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

.custom-file-container input[type="file"] {
  position: absolute;
  opacity: 0;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  cursor: pointer;
}

.custom-file-button {
  padding: 10px 20px;
  background-color: #840705;
  color: #C3BB38;
  border: 1px solid #C3BB38;
  border-radius: 5px;
  cursor: pointer;
  font-size: 48px;
  text-align: center;
}

.custom-file-button:hover {
  background-color: rgb(84, 4, 3);
  cursor: pointer;
}
</style>

<h3 class="titulo">Crear Habitación</h3>

<div class="container">
    <form method="POST" action="{{ route('habitaciones.guardar') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="letras1" for="numero">Número de Habitación*:</label>
            <input class="celda" type="number" id="numero" name="numero" value="{{ $habitacion->numero }}" required>
        </div>

        <div class="form-group">
            <label class="letras1" for="planta">Planta*:</label>
            <input class="celda" type="number" id="planta" name="planta" value="{{ $habitacion->planta }}" required>
        </div>

        <div class="form-group">
            <label class="letras1" for="vistas">Vistas*:</label>
            <input class="celda" type="text" id="vistas" name="vistas" value="{{ $habitacion->vistas }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="tipo_id">Tipo de Habitación*:</label>
            <select class="celda" id="tipo_id" name="tipo_id" required>
                <option value="" disabled selected>Seleccionar tipo...</option>
                @foreach($tiposHabitacion as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="disponible">Disponible*:</label>
            <select class="celda" id="disponible" name="disponible">
                <option value="1" {{ $habitacion->disponible ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$habitacion->disponible ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="imagenes" style="display: block;">Imágenes de la Habitacion*:</label>
            <div class="custom-file-container" style="display: block;">
              <button type="button" style=" margin-left: 20px;" class="custom-file-button">Subir Imagen</button>
              <input style="margin-top: 10px;" class="celda" type="file" id="imagenes" name="imagenes[]" multiple accept="image/*" onchange="mostrarNombres()">
              <div id="lista-imagenes" style="margin-top: 10px; color: #C3BB38; font-family: 'Solitreo'; font-size: 20px;"></div>
            </div>
        </div>

        <button type="submit" class="button-1">Crear</button>
    </form>
</div>

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
