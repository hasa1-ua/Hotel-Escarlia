<style>

.titulo {
  color: #C3BB38;
  font-family: "Yellowtail";
  font-weight: 300;
  font-size: 72px;
  text-align: center;
}


.container{
  width: auto;
  height: auto;
  padding: 8px 8px 50px 8px;
  background: #000000;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  border-radius: 15px;
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

button {
  width: 363px;
  height: 73px;
  background: #840705;
  color: #C3BB38;
  border-color: #C3BB38;
  border-width: 1px;
  border-style: solid;
  font-family: "Solitreo";
  font-weight: 400;
  font-size: 60px;
  margin-left: 20px;
  border-radius: 15px;
}

.button1{
  margin-top: 40px;
  border-radius: 15px;
}


.celda{
    padding: 10px;
    font-size: 48px; 
    font-family: "Solitreo";
    border: 1px solid #C3BB38; /* Borde del input */
    border-radius: 15px;
    background-color: #840705; /* Fondo rojo claro */
    color: #C3BB38; /* Texto en rojo oscuro */
    width: 500px;
    height: 70px;
}

.dynamic-width {
    display: inline-block;
    min-width: 360px; /* Ancho mínimo */
}

.label{
  margin-top: 0px;
}

.form-group label[for="descripcion"] {
    margin-top: 20px; /* Ajusta este valor según necesites */
    display: block;
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
        border-radius: 15px;
    }

    /* Botón personalizado */
    .custom-file-button {
        padding: 10px 20px;
        background-color:  #840705;
        color: #C3BB38;
        border: 1px solid #C3BB38;
        border-radius: 5px;
        cursor: pointer;
        font-size: 48px;
        text-align: center;
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
    <h3 class="titulo">Crear regimen</h3>

    <div class="container">


    <div class="label">

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <form action="{{ route('regimenes.guardar', $regimen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
    

        <div class="form-group">
            <label class="letras1" for="nombre">Nombre*:</label>
            <select class="celda" style=" margin-left: 20px;"  id="nombre" name="nombre">
                <option value="">Seleccione un nombre</option>
                @foreach($regimenes as $reg)
                <option value="{{ $reg->id }}" {{ $regimen->id == $reg->id ? 'selected' : '' }}>
                    {{ $reg->nombre }}
                </option>
            @endforeach
            </select>
            @error('nombre')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class="form-group">
            <label class="letras1" for="precio">Precio*:</label>
            <input class="celda dynamic-width"
            oninput="adjustInputWidth(this)" style=" margin-left: 20px;"  type="number" id="precio" name="precio" step="0.01" value="{{ $regimen->precio}}">
            @error('precio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class= "separation">
            <button class="button1" type="submit">Crear</button>
            <button class="button1" type="button" onclick="window.location.href='/Webmaster/menu-reservas/regimenes';">Volver</button>
        </div>
    </form>
    </div>
    </div>


    <script>
function adjustInputWidth(input) {
    // Crear un elemento invisible para medir el texto
    const tempSpan = document.createElement("span");
    tempSpan.style.visibility = "hidden";
    tempSpan.style.position = "absolute";
    tempSpan.style.whiteSpace = "nowrap";
    tempSpan.style.fontSize = window.getComputedStyle(input).fontSize;
    tempSpan.style.fontFamily = window.getComputedStyle(input).fontFamily;
    tempSpan.textContent = input.value || input.placeholder;

    // Agregar al documento temporalmente
    document.body.appendChild(tempSpan);

    // Ajustar el ancho del input basado en el ancho del texto
    input.style.width = `${tempSpan.offsetWidth + 20}px`;

    // Eliminar el span temporal
    document.body.removeChild(tempSpan);
}

// Ajustar el ancho de los inputs al cargar la página
document.querySelectorAll(".dynamic-width").forEach(input => {
    adjustInputWidth(input);
});

</script>
@endsection
