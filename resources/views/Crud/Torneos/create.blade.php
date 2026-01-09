<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Torneo</title>
        <link rel="stylesheet" href="{{ asset('css/styles_crud.css') }}">
    </head>
    <body class="body-especial">
        @if ($errors->any())
            <div class="alerta errores">
                <h2>Errores</h2>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alerta success">
                <ul>
                    <li>{{ session('success') }}</li>
                </ul>
            </div>
        @endif
        <a href="{{ url('Crud/Torneo/') }}" class="boton agregar">Regresar</a>
        <main class="main-especial">
            <div class="formulario-crear">
                <h2>Crear Torneo</h2>
                <form method="post" action="{{ url('Crud/Torneo') }}">
                    @csrf
                    <input type="hidden" value="normal" name="tipoInsercion">
                    @include ('Crud.Torneos.form',["modo" => "Guardar"])
                </form>
                <h2>Carga Masiva</h2>
                <form action="{{ url('Crud/Torneo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tipoInsercion" value="cargaMasiva">
                    <label for="archivo">Archivo</label>
                    <input type="file" name="archivo" id="archivo">
                    <input type="submit" value="Guardar Datos" class="boton editar">
                </form>
            </div>
        </main>
        @vite('resources/js/alertas.js')
    </body>
</html>