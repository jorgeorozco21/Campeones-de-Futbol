<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fases de Eliminacion</title>
        <link rel="stylesheet" href="{{ asset('css/styles_crud.css') }}">
    </head>
    <body class="body-especial">
        <main class="main-especial">
            <div class="funciones">
                <!-- Aqui es donde se hace el buscador -->
                <!--<form>
                    <input type="text">
                </form>-->
                <a href="{{ url('Crud/Fases_Eliminacion/create') }}" class="boton agregar">+ Agregar</a>
                <a href="{{ url('Crud') }}" class="boton regresar">Regresar</a>
            </div>
            <table class="informacion">
                <tr>
                    <th class="columna principal">#</th>
                    <th class="columna principal">Equipo 1</th>
                    <th class="columna principal">Equipo 2</th>
                    <th class="columna principal">Torneo</th>
                    <th class="columna principal">Tipo de Eliminacion</th>
                    <th class="columna principal">Fase</th>
                    <th class="columna principal">Llave</th>
                    <th class="columna principal">Resultado 1</th>
                    <th class="columna principal">Resultado 2</th>
                    <th class="columna principal">Resultado 3</th>
                    <th class="columna principal acciones">Acciones</th>
                </tr>
                @foreach ($fasesEliminacion as $fase)
                    <tr>
                        <td class="columna">{{ $fase->id}}</td>
                        <td class="columna"><img src="{{ asset('storage').'/'.$fase->escudoEquipo1 }}" class="escudo"></td>
                        <td class="columna"><img src="{{ asset('storage').'/'.$fase->escudoEquipo2 }}" class="escudo"></td>
                        <td class="columna"><img src="{{ asset('storage').'/'.$fase->Logo }}" class="escudo">{{ $fase->nombreCompeticion }} {{ $fase->Edicion }}</td>
                        <td class="columna">{{ $fase->Tipo }}</td>
                        <td class="columna">{{ $fase->Fase }}</td>
                        <td class="columna">{{ $fase->Llave }}</td>
                        <td class="columna">{{ $fase->Resultado1 }}</td>
                        <td class="columna">{{ $fase->Resultado2 }}</td>
                        <td class="columna">{{ $fase->Resultado3 }}</td>
                        <td class="columna editar-eliminar">
                            <a href="{{ url('Crud/Fases_Eliminacion/'.$fase->id.'/edit') }}" class="boton editar">Editar</a> 
                            <form  action="{{ url('Crud/Fases_Eliminacion/'.$fase->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Deseas borrar el resultado ??')" value="Borrar" class="boton borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>