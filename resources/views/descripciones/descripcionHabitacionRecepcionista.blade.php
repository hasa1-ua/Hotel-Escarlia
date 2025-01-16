<style>
.container{
  width: 1435px;
  height: 840px;
  padding: 8px;
  background: #000000;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  display: flex;
  justify-content: space-between;
  margin-left: -10px;
  padding: 22px;
}

.carousel {
    position: relative;
    width: 100%;
    max-width: 750px;
    max-height: 500px;
    overflow: hidden;
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
}

.carousel-control {
    position: absolute;
    top: 30%;
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

.information{
  width: 45%;
  color: #C3BB38;
  font-family: "Solitreo";
  padding: 20px;
  font-size: 38px;
}

.information h1, .information h3, .information h5{
  margin: 10px 0;
}

.information .button-container{
  display: flex;
  justify-content: flex-end;
}

.button1{
  width: 250px;
  height: 65px;
  background: #840705;
  color: #C3BB38;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  border-radius: 3px;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 45px;
  text-align: center;
  margin: 0 10px;
  cursor: pointer;
}

.button2{
    width: 100px;
  height: 60px;
  background: #840705;
  color: #C3BB38;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  border-radius: 3px;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 42px;
  text-align: center;
  margin: 0 10px;
  cursor: pointer;
}

.margen2{
    display: flex;
    margin-top: 300px;
    justify-content: space-between;
}

</style>

@extends('layoutRecepcionista')
@section('contenido')

<div class="container">
    <!-- Carrusel de imágenes -->
    <div class="carousel">
        <div class="carousel-images">
            @foreach ($fotos as $foto)
                <img src="{{ asset($foto->url) }}" class="carousel-item">
            @endforeach
        </div>
        <button class="carousel-control prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="carousel-control next" onclick="moveSlide(1)">&#10095;</button>
        <!-- Navegación entre habitaciones -->
        <div class="information">
            <h3>Precio: {{$habitacion->tipo->precio}}€</h3>
            <h3>Plazas: {{$habitacion->tipo->plazas}}</h3>
            @if ($habitacion->disponible)
                <h3>Disponible</h3>
            @else
                <h3>No disponible</h3>
            @endif
        </div>
        <a href="{{ route('descripcion.habitaciones.recepcionista', ['tipoid' => $habitacion->tipo_id, 'id' => $nextHabitacion->id]) }}" class="button2">Habitación anterior</a>
        <a href="{{ route('descripcion.habitaciones.recepcionista', ['tipoid' => $habitacion->tipo_id, 'id' => $previousHabitacion->id]) }}" class="button2">Siguiente habitación</a>
    </div>
    

    <!-- Información de la habitación -->
    <div class="information">
        <h1>{{ $habitacion->tipo->nombre }}</h1>
        <h5>Número: {{ $habitacion->getNumero() }}</h5>
        <h3>{{$habitacion->tipo->descripcion}}</h3>
        <h5>Vistas: {{ $habitacion->getVistas() }}</h5>   

        <div class="margen2">
            <form method="POST" action="{{ route('habitaciones.toggle', ['tipoid' => $habitacion->tipo->id, 'id' => $habitacion->id]) }}">
                @csrf
                <button type="submit" class="button1">
                    {{ $habitacion->disponible ? 'Bloquear' : 'Desbloquear' }}
                </button>
            </form>
            <button class="button1" onclick="window.location.reload();">Reservar</button>
        </div>
    </div>
</div>


<script>
    let currentIndex = 0;

    function moveSlide(direction) {
        const slides = document.querySelector('.carousel-images');
        const totalSlides = slides.children.length;

        // Actualizar índice actual
        currentIndex = (currentIndex + direction + totalSlides) % totalSlides;

        // Mover las imágenes usando transform
        slides.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
</script>

@endsection
