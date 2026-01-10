<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados Liga</title>
        <link rel="stylesheet" href="{{ asset('css/styles_crud.css') }}">
    </head>
    <body class="body-especial">
        <main class="main-especial">
            <div class="funciones">
                <!-- Aqui es donde se hace el buscador -->
                <!--<form>
                    <input type="text">
                </form>-->
                <a href="{{ url('Crud/Resultados_Liga/create') }}" class="boton agregar">+ Agregar</a>
                <a href="{{ url('Crud') }}" class="boton regresar">Regresar</a>
            </div>
            <table class="informacion">
                <tr>
                    <th class="columna principal">#</th>
                    <th class="columna principal">Equipo</th>
                    <th class="columna principal">Torneo</th>
                    <th class="columna principal">G</th>
                    <th class="columna principal">P</th>
                    <th class="columna principal">E</th>
                    <th class="columna principal">GA</th>
                    <th class="columna principal">GC</th>
                    <th class="columna principal">DG</th>
                    <th class="columna principal">Puntos</th>
                    <th class="columna principal">Clasificacion</th>
                    <th class="columna principal acciones">Acciones</th>
                </tr>
                @foreach ($resultadosLiga as $resultado)
                    <tr>
                        <td class="columna">{{ $resultado->id}}</td>
                        <td class="columna"><img src="{{ asset('storage').'/'.$resultado->Escudo }}" class="escudo">{{ $resultado->nombreEquipo }}</td>
                        <td class="columna"><img src="{{ asset('storage').'/'.$resultado->Logo }}" class="escudo">{{ $resultado->nombreCompeticion }}</td>
                        <td class="columna">{{ $resultado->Ganados }}</td>
                        <td class="columna">{{ $resultado->Perdidos }}</td>
                        <td class="columna">{{ $resultado->Empates }}</td>
                        <td class="columna">{{ $resultado->GA }}</td>
                        <td class="columna">{{ $resultado->GC }}</td>
                        <td class="columna">{{ $resultado->DG }}</td>
                        <td class="columna">{{ $resultado->Puntos }}</td>
                        <td class="columna">{{ $resultado->Clasificacion }}</td>
                        <td class="columna editar-eliminar">
                            <a href="{{ url('Crud/Resultados_Liga/'.$resultado->id.'/edit') }}" class="boton editar">Editar</a> 
                            <form  action="{{ url('Crud/Resultados_Liga/'.$resultado->id) }}" method="post">
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