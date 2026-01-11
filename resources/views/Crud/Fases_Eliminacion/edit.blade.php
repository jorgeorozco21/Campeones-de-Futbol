<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Resultado</title>
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
        <a href="{{ url('Crud/Fases_Eliminacion/') }}" class="boton agregar">Regresar</a>
        <main class="main-especial">
            <div class="formulario-crear">
                <h2>Editar Resultado</h2>
                <form method="post" action="{{ url('Crud/Fases_Eliminacion/'.$fasesEliminacion->id) }}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <label for="equipo1">Equipo 1</label>
                    <select id="equipo1" name="ID_Equipo1">
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}" {{ ($fasesEliminacion->ID_Equipo1 == $equipo->id)?'selected':'' }}>{{ $equipo->Nombre }}</option>
                        @endforeach
                    </select>
                    <label for="equipo2">Equipo 2</label>
                    <select id="equipo2" name="ID_Equipo2">
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}" {{ ($fasesEliminacion->ID_Equipo2 == $equipo->id)?'selected':'' }}>{{ $equipo->Nombre }}</option>
                        @endforeach
                    </select>
                    <label for="torneo">Torneo</label>
                    <select id="torneo" name="ID_Torneo">
                        @foreach ($torneos as $torneo)
                            <option value="{{ $torneo->id }}" {{ ($fasesEliminacion->ID_Torneo == $torneo->id)?'selected':'' }}>{{ $torneo->Nombre }} {{ $torneo->Edicion }}</option>
                        @endforeach
                    </select>
                    <label for="tipo">Tipo de Eliminacion</label>
                    <select id="tipo" name="Tipo">
                        <option value="eliminacionDirecta" {{ ($fasesEliminacion->Tipo == 'eliminacionDirecta')?'selected':'' }}>Eliminacion Directa</option>
                        <option value="idaVuelta" {{ ($fasesEliminacion->Tipo == 'idaVuelta')?'selected':'' }}>Ida y Vuelta</option>
                        <option value="playOff" {{ ($fasesEliminacion->Tipo == 'playOff')?'selected':'' }}>Play Off</option>
                    </select>
                    <label id="fase">Fase</label>
                    <select id="fase" name="Fase">
                        <option value="1" {{ ($fasesEliminacion->Fase == '1')?'selected':'' }}>Final</option>
                        <option value="2" {{ ($fasesEliminacion->Fase == '2')?'selected':'' }}>SemiFinal</option>
                        <option value="4" {{ ($fasesEliminacion->Fase == '4')?'selected':'' }}>4tos de Final</option>
                        <option value="8" {{ ($fasesEliminacion->Fase == '8')?'selected':'' }}>8vos</option>
                        <option value="16" {{ ($fasesEliminacion->Fase == '16')?'selected':'' }}>16vos</option>
                        <option value="32" {{ ($fasesEliminacion->Fase == '32')?'selected':'' }}>32vos</option>
                    </select>
                    <label id="for">Llave</label>
                    <input type="text" id="llave" name="Llave" value="{{ isset($fasesEliminacion->Llave)?$fasesEliminacion->Llave:old('Llave') }}">
                    <label for="resultado1">Resultado 1</label>
                    <input type="text" id="resultado1" name="Resultado1" value="{{ isset($fasesEliminacion->Resultado1)?$fasesEliminacion->Resultado1:old('Resultado1') }}">
                    <label for="resultado2">Resultado 2</label>
                    <input type="text" id="resultado2" name="Resultado2" value="{{ isset($fasesEliminacion->Resultado2)?$fasesEliminacion->Resultado2:old('Resultado2') }}">
                    <label for="resultado3">Resultado 3</label>
                    <input type="text" id="resultado3" name="Resultado3" value="{{ isset($fasesEliminacion->Resultado3)?$fasesEliminacion->Resultado3:old('Resultado3') }}">
                    <input type="hidden" name="ID_Resultado" value="0">
                    <input type="submit" value="Editar Datos" class="boton editar">
                </form>
            </div>
        </main>
        @vite('resources/js/alertas.js')
        @vite('resources/js/activar_resultado.js')
    </body>
</html>