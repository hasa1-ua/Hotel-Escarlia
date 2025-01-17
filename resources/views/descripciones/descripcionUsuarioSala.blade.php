<style>

.container{
  margin-top: 20px;
  margin-left: -10px;
  width: 1420px;
  height: 830px;
  padding: 8px 8px 8px 8px;
  background: #000000;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  border-radius: 15px;
}

.label1{
  margin-left: 50px;
  margin-top: 0px;
  display: inline-block; /* Permite que esté en línea con la imagen */
  vertical-align: middle;
  margin-top: -840px;
  margin-left: 800px;
}

.letras1 {
  width: 479px;
  height: 68px;
  color: #C3BB38;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 48px;
  text-align: left;
}

.label2{
    margin-top: -300px;
    margin-left: 20px;
}

.button1{
  width: 363px;
  height: 73px;
  background: #840705;
  color: #C3BB38;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  border-radius: 15px;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 60px;
  text-align: center;
  float: right;
  margin-right: 200px;
  margin-top: -200px;
}

.button2{
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
  margin-right: 260px;
  margin-top: 30px;
  border-radius: 20px;
}

.carousel {
    position: relative;
    width: 100%;
    max-width: 750px;
    max-height: 500px;
    overflow: hidden;
    margin-top: -100px;
    margin-left: 20px;
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



</style>



@extends('layoutUsuario')
@section('contenido')


<div class="container">
        <h1>{{ $sala->getNombre() }}</h1>
        <p>Aforo: {{ $sala->getAforo() }}</p>
        <p>Disponible: {{ $sala->getDisponible() ? 'Sí' : 'No' }}</p>

        <div class="carousel">
                <div class="carousel-images">
                    @foreach ($fotos as $foto)
                        <img src="{{ asset($foto->url) }}" alt="Foto de {{ $sala->getNombre() }}" class="carousel-item">
                        
                    @endforeach
                </div>
                <button class="carousel-control prev" onclick="moveSlide(-1)">&#10094;</button>
                <button class="carousel-control next" onclick="moveSlide(1)">&#10095;</button>
            </div>
    </div>

    <div class="label1">
        <h3 class="letras1">{{$sala->nombre}}</h3>
        <h3 class="letras1">{{$sala->tipoSala->descripcion}}</h3>
        <h3 class="letras1" style="margin-top: 270px;">Precio: {{$sala->tipoSala->precio}}€</h3>
    </div>

    <div class="label2">
        <h3 class="letras1">Aforo: {{$sala->tipoSala->aforo}}</h3>
        @if ($sala->disponible)
            <h3 class="letras1">Disponible</h3>
        @else
            <h3 class="letras1">No disponible</h3>
        @endif
        <a href="{{ route('usuario.reservarSala.form', ['tipoid' => $sala->tipo_sala_id, 'id' => $sala->id]) }}" class="button1">Reservar</a>
    </div>

    <div>
        <a href="{{ route('descripcion.sala.usuario', ['tipoid' => $sala->tipo_sala_id, 'id' => $previousSala->id]) }}" class="button2">Siguiente sala</a>
        <a href="{{ route('descripcion.sala.usuario', ['tipoid' => $sala->tipo_sala_id, 'id' => $nextSala->id]) }}" class="button2">Sala anterior</a>
    </div>
<div>


<script>
    let currentIndex = 0;

    function moveSlide(direction) {
        const slides = document.querySelector('.carousel-images');
        const totalSlides = slides.children.length;

        currentIndex = (currentIndex + direction + totalSlides) % totalSlides;
        slides.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
</script>




@endsection