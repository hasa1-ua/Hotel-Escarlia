<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-BIG5nRf10uGvU9t93Tj4+IDUXoZB9sH50sWfTVlwF/ZBNn5FmS8uIY+zmxUZWT+lW2IUSd4Yz3lYB+uew8phOw==" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Solitreo&display=swap" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <style>
            header {
                background-color:rgb(0, 0, 0);
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
            }
            body{
                background-image: url("/imagenes/BarraDeMenu/FondoFoto.png");
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                
            }

            .imagen {
                height: 80px;
                margin-top: 10px;
                margin-bottom: 10px;
                margin-left: 20px;
                cursor: pointer;
                border-radius: 20px 20px 20px 20px;
            }

            .barra-nav {
                border: 1px solid black;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .opcion {
                color: black;
                text-decoration: none;
                font-weight: bold;
                font-size: 25px;
                flex-grow: 1; 
                text-align: center;
                cursor: pointer;
                margin-bottom: 25px;
            }

            .dropdown {
                position: relative;
            }

            .dropdown-menu {
                display: none;
                position: absolute;
                top: 100%;
                right: 0;
            }

            .dropdown:hover .dropdown-menu {
                display: block;
            }

            .dropdown-menu-item {
                cursor: pointer;
            }

            .dropdown-menu-item a {
                display: block;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                margin-bottom: 10px;
            }

            .rectangle-1 {
                width: 1461px;
                height: 122px;
                padding: 8px 8px 8px 8px;
                background: #000000;
                border-color: #C3BB38;
                border-width: 1px;
                border-style: solid;
                margin-left: 229px;
                text-align: left;
                border-radius: 20px;
            }

            .habitaciones {
                width: 236px;
                height: 67px;
                color: #C3BB38;
                font-family: "Yellowtail";
                font-weight: 400;
                font-size: 48px;
                text-align: left;
            }

            .fotos {
                width: 91px;
                height: 67px;
                color: #C3BB38;
                font-family: "Yellowtail";
                font-weight: 400;
                font-size: 48px;
                text-align: left;
            }

            .sobre-nosotros {
                width: 268px;
                height: 67px;
                color: #C3BB38;
                font-family: "Yellowtail";
                font-weight: 400;
                font-size: 48px;
                text-align: left;
            }

            .image-placeholder {
                width: 148px;
                height: 95px;
                background: #E6E6E6;
            }

            .salas-de-conferencia {
                width: 343px;
                height: 67px;
                color: #C3BB38;
                font-family: "Yellowtail";
                font-weight: 400;
                font-size: 48px;
                text-align: left;
            }

            .perfil {
                width: 118px;
                height: 122px;
                background: #00000000;
                margin-right: 30px;
                margin-bottom: 10px;
            }


            .rectangle {
                width: 250px;
                height: 55px;
                padding: 8px 8px 8px 8px;
                background: #000000;
                border-color: #C3BB38;
                border-width: 1px;
                border-style: solid;
                border-radius: 5px;
            }

            .dropdown-perfil {
                width: 221px;
                height: 57px;
                color: #C3BB38;
                border-color: #C3BB38;
                font-family: "Solitreo";
                font-weight: 400;
                font-size: 40px;
                text-align: left;
            }

            .contenido {
                margin-left: 229px;
                max-width: 1461px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                padding: 10px;
                box-sizing: border-box;
            }

            .btn-login {
                font-family: "Solitreo";
                font-weight: bold;
                padding: 10px 20px;
                border-width: 1px;
                border-style: solid;
                border-radius: 3px;
                font-family: "Solitreo";
                font-size: 20px; /* Letra más grande en el botón */
                cursor: pointer;
                margin-right: 25px;
                margin-bottom: 30px;
                background: #840705;
                color: #C3BB38;
                border-color: #F4EB49;
                border-radius: 15px;
            }

            .btn-login:hover {
                background-color: #a8922f; /* Color dorado más oscuro al pasar el mouse */
            }

        </style>
    </head>
        <header class="rectangle-1">
            <a onclick="window.location.href='/Publico'">
                <img class='imagen image-placeholder' src="/imagenes/BarraDeMenu/Logo.png">
            </a>

            <div class="barra-nav">
                <div class="opcion"><a onclick="window.location.href='/Publico/habitaciones'" class="habitaciones">Habitaciones&nbsp;&nbsp;&nbsp;</a></div>
                <div class="opcion"><a onclick="window.location.href='/Publico/salas-de-conferencia'" class="salas-de-conferencia">&nbsp;Salas de conferencia&nbsp;&nbsp;</a></div>
                <div class="opcion"><a onclick="window.location.href='/Publico/fotos'" class="fotos">&nbsp;&nbsp;Fotos&nbsp;&nbsp;</a></div>
                <div class="opcion"><a onclick="window.location.href='/Publico/sobre-nosotros'" class="sobre-nosotros">&nbsp;&nbsp;Sobre nosotros&nbsp;</a></div>
            </div>
            <!-- Botón de Login -->
            <button class="btn-login" onclick="window.location.href='/login'">
                Iniciar sesión
            </button>
        </header>
        <div class="contenido">
            @yield('contenido')
        </div>
</html>