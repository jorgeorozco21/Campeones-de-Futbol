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
        <a href="{{ url('Crud/Resultados_Liga/') }}" class="boton agregar">Regresar</a>
        <main class="main-especial">
            <div class="formulario-crear">
                <h2>Editar Resultado</h2>
                <form method="post" action="{{ url('Crud/Resultados_Liga/'.$resultado->id) }}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <label for="equipo">Equipo</label>
                    <select id="equipo" name="ID_Equipo">
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}" {{ ($resultado->ID_Equipo == $equipo->id)?'selected':'' }}>{{ $equipo->Nombre }}</option>
                        @endforeach
                    </select>
                    <label for="torneo">Torneo</label>
                    <select id="torneo" name="ID_Torneo">
                        @foreach ($torneos as $torneo)
                        <option value="{{ $torneo->id }}" {{ ($resultado->ID_Torneo == $torneo->id)?'selected':'' }}>{{ $torneo->Nombre }} {{ $torneo->Edicion }}</option>
                        @endforeach
                    </select>
                    <label for="ganados">Partidos Ganados</label>
                    <input type="number" id="ganados" name="Ganados" value="{{ isset($resultado->Ganados)?$resultado->Ganados:old('Ganados') }}">
                    <label for="perdidos">Partidos Perdidos</label>
                    <input type="number" id="perdidos" name="Perdidos" value="{{ isset($resultado->Perdidos)?$resultado->Perdidos:old('Perdidos') }}">
                    <label for="empatados">Partidos Empatados</label>
                    <input type="number" id="empatados" name="Empates" value="{{ isset($resultado->Empates)?$resultado->Empates:old('Empates') }}">
                    <label for="ga">Goles a Favor</label>
                    <input type="number" id="ga" name="GA" value="{{ isset($resultado->GA)?$resultado->GA:old('GA') }}">
                    <label for="gc">Goles en Contra</label>
                    <input type="number" id="gc" name="GC" value="{{ isset($resultado->GC)?$resultado->GC:old('GC') }}">
                    <label for="dg ">Diferencia de Gol</label>
                    <input type="number" id="dg" name="DG" value="{{ isset($resultado->DG)?$resultado->DG:old('DG') }}">
                    <label for="puntos">Puntos</label>
                    <input type="number" id="puntos" name="Puntos" value="{{ isset($resultado->Puntos)?$resultado->Puntos:old('Puntos') }}">
                    <label for="clasificacion">Clasificacion</label>
                    <select id="clasificacion" name="Clasificacion">
                        <option value="Sin Clasificacion" {{ ($resultado->Clasificacion == 'Sin Clasificacion')?'selected':'' }}>Sin Clasificacion</option>
                        <option value="Descenso" {{ ($resultado->Clasificacion == 'Descenso')?'selected':'' }}>Descenso</option>
                        <option value="Campeon" {{ ($resultado->Clasificacion == 'Campeon')?'selected':'' }}>Campeon</option>
                        <option value="Champions League" {{ ($resultado->Clasificacion == 'Champions League')?'selected':'' }}>Champions League</option>
                        <option value="Europa League" {{ ($resultado->Clasificacion == 'Europa League')?'selected':'' }}>Europa League</option>
                        <option value="Conferens League" {{ ($resultado->Clasificacion == 'Conferens League')?'selected':'' }}>Conferens League</option>
                        <option value="Recopa de Europa" {{ ($resultado->Clasificacion == 'Recopa de Europa')?'selected':'' }}>Recopa de Europa</option>
                    </select>
                    <input type="hidden" value="0" name="ID_Resultado">
                    <input type="submit" class="boton editar" value="Editar Datos">
                </form>
            </div>
        </main>
        @vite('resources/js/alertas.js')
    </body>
</html>