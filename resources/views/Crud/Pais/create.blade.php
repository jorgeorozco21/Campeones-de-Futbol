<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pais</title>
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
        <a href="{{ url('Crud/Pais/') }}" class="boton agregar">Regresar</a>
        <main class="main-especial">
            <div class="formulario-crear">
                <h2>Crear Pais</h2>
                <form method="post" action="{{ url('Crud/Pais') }}">
                    @csrf
                    @include("Crud.Pais.form",["modo" => "Guardar"])
                </form>
            </div>
        </main>
        @vite('resources/js/alertas.js')
    </body>
</html>