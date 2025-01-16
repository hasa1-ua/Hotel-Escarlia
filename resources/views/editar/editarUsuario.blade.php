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
  width: auto;
  height: 860px;
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


button {
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
  margin-left: 20px;
  
}

.button1{
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
    width: auto;
    height: 70px;
}

.label{
  margin-top: 0px;
}


.dynamic-width {
    display: inline-block;
    min-width: 360px; /* Ancho mínimo */
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

</style>


@extends('layoutWebmaster')

@section('contenido')

    <h3 class="titulo">Editar Usuario</h3>

    <div class="container">
    <div class="label">

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <form action="{{ route('usuarios.actualizar', $usuarios->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Método PUT para actualizar -->
        
        <div class="form-group">
            <label class="letras1" for="nombre_usuario">Nombre*:</label>
            <input style=" margin-left: 20px;"
            type="text" 
            id="nombre_usuario" 
            name="nombre_usuario" 
            value="{{ $usuarios->nombre_usuario }}"
            class="celda dynamic-width"
            oninput="adjustInputWidth(this)">
        </div>

        <div class="form-group">
            <label class="letras1" for="email">Email*:</label>
            <input class="celda dynamic-width"
            oninput="adjustInputWidth(this)" style=" margin-left: 20px;"  type="text" id="email" name="email" value="{{ $usuarios->email }}">
            @error('email')
                <small style="color:aliceblue">{{ $message }}</small>
    @end    @enderror
        </div>

        <div class="form-group">
            <label class="letras1" for="fecha_nacimiento">Fecha nacimiento:</label>
            <input class="celda dynamic-width"
            oninput="adjustInputWidth(this)" style=" margin-left: 20px;"  type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $usuarios->fecha_nacimiento }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="telefono">Telefono:</label>
            <input class="celda dynamic-width"
            oninput="adjustInputWidth(this)" style=" margin-left: 20px;"  type="number" id="telefono" name="telefono" value="{{ $usuarios->telefono }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="direccion">Direccion:</label>
            <input class="celda dynamic-width"
            oninput="adjustInputWidth(this)" style=" margin-left: 20px;"  type="text" id="direccion" name="direccion" value="{{ $usuarios->direccion }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="nacionalidad">Nacionalidad:</label>
            <input class="celda dynamic-width"
            oninput="adjustInputWidth(this)" style=" margin-left: 20px;"  type="number" id="nacionalidad" name="nacionalidad" value="{{ $usuarios->nacionalidad }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="pais_residencia">Pais:</label>
            <input class="celda dynamic-width"
            oninput="adjustInputWidth(this)" style=" margin-left: 20px;"  type="number" id="pais_residencia" name="pais_residencia" value="{{ $usuarios->pais }}">
        </div>

        <div class="form-group">
            <label class="letras1" for="rol">Rol*:</label>
            <select class="celda" style=" margin-left: 20px;"  id="rol" name="rol">
                <option value="Webmaster" {{ $usuarios->rol == "Webmaster" ? 'selected' : '' }}>Webmaster</option>
                <option value="Recepción" {{ $usuarios->rol == "Recepción" ? 'selected' : '' }}>Recepción</option>
                <option value="Cliente" {{ $usuarios->rol == "Cliente" ? 'selected' : '' }}>Cliente</option>
            </select>
        </div>

        


        <button class="button1" type="submit">Editar</button>
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
