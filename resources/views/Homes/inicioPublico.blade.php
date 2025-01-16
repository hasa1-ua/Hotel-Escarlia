@extends('layoutPublico')
@section('contenido')
<style>
    .hero-section {
        background: #00000080;
        color: white;
        height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        border-color: #C3BB38;
        border-width: 1px;
        border-style: solid;
        padding: 25px;
        border-radius: 10px;
        font-family: "Solitreo";
    }

    .titulo {
        color: #C3BB38;
        font-family: "Solitreo";
        font-weight: 300;
        font-size: 70px;
        margin-bottom: 0px;
        margin-top: auto;
        text-align: center;
    }

    .btn-primary {
        background: #840705;
        color: #C3BB38;
        border-color: #F4EB49;
        border-width: 1px;
        border-style: solid;
        border-radius: 3px;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1.2em;
        font-family: "Solitreo";
    }

    .btn-primary button:hover {
        background: #A00000;
    }

    .features-section {
        display: flex;
        justify-content: space-around;
        padding: 50px 0;
        background: #00000090;
        color: white;
        border-color: #C3BB38;
        border-width: 1px;
        border-style: solid;
        padding: 25px;
        border-radius: 10px;
        font-family: "Solitreo";
    }

    .feature {
        text-align: center;
        max-width: 300px;
        font-family: "Solitreo";
    }

    .feature h2 {
        font-size: 1.5em;
        margin-bottom: 10px;
        color: #C3BB38;
        font-family: "Solitreo";
    }

    .about-section {
        text-align: center;
        padding: 50px 20px;
        background-color: #00000080;
        color: white;
        border-color: #C3BB38;
        border-width: 1px;
        border-style: solid;
        padding: 25px;
        border-radius: 10px;
        font-family: "Solitreo";
    }

    .about-section h2 {
        font-size: 2em;
        margin-bottom: 20px;
        color: #C3BB38;
        font-family: "Solitreo";
    }

    .about-section p {
        font-size: 1.2em;
        max-width: 800px;
        margin: 0 auto;
        font-family: "Solitreo";
    }
</style>
<div class="hero-section">
        <div class="hero-content">
            <h1 class="titulo">Bienvenido a Hotel Escarlia</h1>
            <p>Disfruta de una experiencia única y lujosa en el corazón de la ciudad.</p>
            <a href="/register" class="btn btn-primary">Regístrate</a>
        </div>
    </div>

    <div class="features-section">
        <div class="feature">
            <h2>Habitaciones de Lujo</h2>
            <p>Relájate en nuestras habitaciones diseñadas para tu comodidad.</p>
        </div>
        <div class="feature">
            <h2>Salas de Conferencia</h2>
            <p>Organiza tus eventos en nuestras modernas salas de conferencia.</p>
        </div>
        <div class="feature">
            <h2>Spa y Bienestar</h2>
            <p>Disfruta de tratamientos de spa y bienestar para rejuvenecer tu cuerpo y mente.</p>
        </div>
    </div>

    <div class="about-section">
        <h2>★★★★☆</h2>
        <p>Hotel Escarlia es un hotel de lujo ubicado en el corazón de la ciudad, ofreciendo una experiencia única y memorable para todos nuestros huéspedes.</p>
    </div>
@endsection