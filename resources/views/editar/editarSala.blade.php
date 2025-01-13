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


.button1{
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
  text-align: center;
  float: right;
  margin-right: 1020px;

  margin-top: 40px;
  
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

.carousel {
    position: relative;
    width: 100%;
    max-width: 750px;
    overflow: hidden;
    margin-top: -480px;
    margin-left: 600px;
    float: left;
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

.label{
  margin-top: 40px;
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

img{
  width: 100%; /* Se ajusta al ancho del contenedor */
  height: 100%; /* Se ajusta al alto del contenedor */
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


@extends('layoutWebmaster')

@section('contenido')
    <h3 class="titulo">Editar Sala</h3>

    <div class="container">

    <div class=label>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('sala.actualizar', $salas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Método PUT para actualizar -->
        
        <div class="form-group">
            <label class="letras1" for="nombre">Nombre:</label>
            <input class="celda" style=" margin-left: 20px;  width: 500px;"  type="text" id="nombre" name="nombre" value="{{ $salas->nombre }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="precio">Disponible:</label>
            <select class="celda" style=" margin-left: 20px;"  id="disponible" name="disponible">
                <option value="1" {{ $salas->disponible ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$salas->disponible ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="tipo_sala_id">Tipo Sala:</label>
            <select class="celda" style=" margin-left: 20px;"  id="tipo_sala_id" name="tipo_sala_id">
                <option value="">Seleccione un tipo</option>
                @foreach($tipo_sala as $tipo)
                <option value="{{ $tipo->id }}" {{ $salas->tipo_sala_id == $tipo->id ? 'selected' : '' }}>
                    {{ $tipo->nombre }}
                </option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="letras1" for="imagenes" style="display: block;">Imágenes de la Sala:</label>
            <div class="custom-file-container" style="display: block;">
              <button type="button" style=" margin-left: 20px;" class="custom-file-button">Subir Imagen</button>
              <input style="margin-top: 10px;" class="celda" type="file" id="imagenes" name="imagenes[]" multiple accept="image/*" onchange="mostrarNombres()">
              <div id="lista-imagenes" style="margin-top: 10px; color: #C3BB38; font-family: 'Solitreo'; font-size: 20px;"></div>
            </div>
        </div>

        <button type="submit" class="button1">Editar</button>
    </form>


    <div class="carousel">
            <div class="carousel-images">
                @foreach ($salas->fotos as $foto)
                <div class="carousel-item">
                  <form action="{{ route('sala.eliminarImagen', $foto->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button" title="Eliminar Imagen">&#128465;</button>
                    </form>
                    <img src="{{ asset($foto->url) }}" alt="Foto de {{ $salas->getNombre() }}">
                  </div>
                @endforeach
            </div>
            <button class="carousel-control prev">&#10094;</button>
            <button class="carousel-control next">&#10095;</button>
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
