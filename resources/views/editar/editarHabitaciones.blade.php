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
  width: auto;
  height: auto;
  padding:8px 8px 50px 8px;
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

.button1 {
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
  margin-left: 20px;
  font-size: 60px;
}

.button1 {
  margin-top: 40px;
  border-radius: 15px;
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

.carousel {
    position: relative;
    width: 100%;
    max-width: 600px;
    max-height: 500px;
    overflow: hidden;
    margin-top: -650px;
    margin-left: 750px;
    float: left;
    border-radius: 15px;
}

.carousel-images {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.carousel-item {
    min-width: 100%;
    max-width: 100%;
    float: left;
    position: relative; /* Para permitir que el botón de papelera se posicione sobre la imagen */
}

.carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 10;
    user-select: none;
}

.carousel-control.prev {
    left: 10px;
}

.carousel-control.next {
    right: 10px;
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
        border-radius: 15px;
    }

    .custom-file-button:hover {
        background-color:rgb(84, 4, 3);
        cursor: pointer;
    }


    .delete-button {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: rgba(0, 0, 0, 0.7);
    color: #C3BB38;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    z-index: 10;
    font-size: 16px;
}

.delete-button:hover {
    background-color: rgba(132, 7, 5, 0.9);
    color: #fff;
}



</style>

<h3 class="titulo">Editar Habitación</h3>

<div class="container">

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('habitaciones.actualizar', $habitacion->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- PUT para actualizar -->

        <div class="form-group">
            <label class="letras1" for="numero">Número de Habitación:</label>
            <input class="celda" type="number" id="numero" name="numero" value="{{ $habitacion->numero }}" required>
        </div>

        <div class="form-group">
            <label class="letras1" for="planta">Planta:</label>
            <input class="celda" type="number" id="planta" name="planta" value="{{ $habitacion->planta }}" required>
        </div>

        <div class="form-group">
            <label class="letras1" for="vistas">Vistas:</label>
            <input class="celda" type="text" id="vistas" name="vistas" value="{{ $habitacion->vistas }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="tipo_id">Tipo de Habitación:</label>
            <select class="celda" id="tipo_id" name="tipo_id" required>
                <option value="" disabled>Seleccionar tipo...</option>
                @foreach($tiposHabitacion as $tipo)
                    <option value="{{ $tipo->id }}" {{ $habitacion->tipo_id == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="disponible">Disponible:</label>
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

        <div class= "separation">
            <button class="button1" type="submit">Editar</button>
            <button class="button1" type="button" onclick="window.location.href='/Webmaster/habitaciones';">Volver</button>
        </div>
    </form>

    <div class="carousel">
            <div class="carousel-images">
                @foreach ($habitacion->fotos as $foto)
                <div class="carousel-item">
                <form action="{{ route('habitacion.eliminarImagen', $foto->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button" title="Eliminar Imagen">&#128465;</button>
                    </form>
                    <img src="{{ asset($foto->url) }}" alt="Foto de {{ $habitacion->getNumero() }}">
                  </div>
                @endforeach
            </div>
            <button class="carousel-control prev">&#10094;</button>
            <button class="carousel-control next">&#10095;</button>
        </div>
    </div>
    </div>
</div>


<script>
    let currentIndex = 0;

    function moveSlide(direction, event) {
        event.preventDefault(); // Evita el comportamiento predeterminado
        const slides = document.querySelector('.carousel-images');
        const totalSlides = slides.children.length;

        // Actualizar índice actual
        currentIndex = (currentIndex + direction + totalSlides) % totalSlides;

        // Mover las imágenes usando transform
        slides.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    document.querySelector('.carousel-control.prev').addEventListener('click', (e) => moveSlide(-1, e));
    document.querySelector('.carousel-control.next').addEventListener('click', (e) => moveSlide(1, e));


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


document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(event) {
        if (!confirm('¿Estás seguro de que deseas eliminar esta imagen?')) {
            event.preventDefault();
        }
    });
});
</script>

@endsection
