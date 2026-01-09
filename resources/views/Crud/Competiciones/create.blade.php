<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Competencia</title>
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
        <a href="{{ url('Crud/Competicion/') }}" class="boton agregar">Regresar</a>
        <main class="main-especial">
            <div class="formulario-crear-especial">
                <h2 style="text-align: center;">Agregar Competencia</h2>
                <form method="post" action="{{ url('Crud/Competicion') }}">
                    @csrf
                    <input type="hidden" value="normal" name="tipoInsercion">
                    @include('Crud.Competiciones.form',['modo' => "Guardar"])
                </form>
                <h2 style="text-align: center;">Carga Masiva</h2>
                <form action="{{ url('Crud/Competicion') }}" method="POST" enctype="multipart/form-data">
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