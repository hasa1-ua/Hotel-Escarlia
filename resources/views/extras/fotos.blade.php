@extends('layoutUsuario')

@section('contenido')
<style>
    .titulo {
        text-align: center;
        margin-top: 20px;
        color: #C3BB38;
        font-family: 'Yellowtail';
        font-size: 65px;
        margin-bottom: 20px;
        font-weight: normal;
    }

    .galeria {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
    }

    .galeria-item {
        width: 300px;
        height: 200px;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .galeria-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<div>
    <h1 class="titulo">Hotel Escarlia en imágenes</h1>
</div>

<div class="galeria">
    @php
        $images = [
            "/imagenes/Fotos/governor-s-mansion-montgomery-alabama-grand-staircase-161758.jpeg",
            "/imagenes/Fotos/pexels-photo-164595.jpeg",
            "/imagenes/Fotos/pexels-photo-260922.jpeg",
            "/imagenes/Fotos/pexels-photo-262047.jpeg",
            "/imagenes/Fotos/sheraton-palace-hotel-lobby-architecture-san-francisco-53464.jpeg"
        ];
    @endphp

    @foreach ($images as $image)
        <div class="galeria-item">
            <img src="{{ $image }}" alt="Imagen del hotel">
        </div>
    @endforeach
</div>
@endsection