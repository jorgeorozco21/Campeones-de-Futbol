<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Torneo</title>
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
            <div class="formulario-editar">
                <h2>Editar Torneo</h2>
                <form method="post" action="{{ url('Crud/Torneo/'.$torneo->id) }}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <label for="competicion">Competicion</label>
                    <select id="competicion" name="ID_Competicion">
                        @foreach ($competiciones as $competicion)
                            <option value="{{ $competicion->id }}" {{ ($torneo->ID_Competicion == $competicion->id)?'selected':'' }}>{{ $competicion->Nombre }}</option>
                        @endforeach
                    </select>
                    <label for="edicion">Edicion</label>
                    <input type="text" id="edicion" name="Edicion" value="{{ isset($torneo->Edicion)?$torneo->Edicion:old('Edicion') }}">
                    <label for="equipo">Campeon</label>
                    <select id="equipo" name="ID_Equipo">
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}" {{ ($torneo->ID_Equipo == $equipo->id)?'selected':'' }}>{{ $equipo->Nombre }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Editar Datos" class="boton editar">
                </form>
            </div>
        </main>
        @vite('resources/js/alertas.js')
    </body>
</html>