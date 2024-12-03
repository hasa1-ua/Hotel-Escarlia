<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Escarlia</title>
    <style>
        body {
            margin: 0;
            font-family: 'Georgia', serif;
            color: #FFD700; /* Color dorado */
            background-image: url('imagenes/general/fondo.png'); /* Aquí podrías añadir una imagen o patrón decorativo */
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: black;
            padding: 10px 20px;
        }

        header img {
            width: 50px;
            height: 50px;
        }

        header nav a {
            color: #FFD700;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
        }

        header nav a:hover {
            text-decoration: underline;
        }

        .main-content {
            text-align: center;
            padding: 100px 20px;
            border: 5px solid #FFD700;
            margin: 50px auto;
            max-width: 800px;
            background-color: black;
        }

        .main-content h1 {
            margin: 0;
            font-size: 36px;
        }

        .main-content p {
            margin: 20px 0 0;
            font-size: 20px;
        }

        .decorative-border {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 50px;
        }

        .decorative-border.left {
            left: 0;
        }

        .decorative-border.right {
            right: 0;
        }
    </style>
</head>
<body>
    <header>
        <img src="placeholder.png" alt="Logo">
        <nav>
            <a href="#">Habitaciones</a>
            <a href="#">Salas de conferencia</a>
            <a href="#">Fotos</a>
            <a href="#">Sobre nosotros</a>
        </nav>
        <img src="crown-icon.png" alt="Icono de corona">
    </header>

    <div class="decorative-border left"></div>
    <div class="decorative-border right"></div>

    <main class="main-content">
        <h1>Hotel Escarlia</h1>
        <p>No eliminar</p>
    </main>
</body>
</html>
