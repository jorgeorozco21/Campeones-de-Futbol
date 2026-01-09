<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Torneos</title>
        <link rel="stylesheet" href="{{ asset('css/styles_crud.css') }}">
    </head>
    <body class="body-especial">
        <main class="main-especial">
            <div class="funciones">
                <!-- Aqui es donde se hace el buscador -->
                <!--<form>
                    <input type="text">
                </form>-->
                <a href="{{ url('Crud/Torneo/create') }}" class="boton agregar">+ Agregar</a>
                <a href="{{ url('Crud') }}" class="boton regresar">Regresar</a>
            </div>
            <table class="informacion">
                <tr>
                    <th class="columna principal">#</th>
                    <th class="columna principal">Competicion</th>
                    <th class="columna principal">Edicion</th>
                    <th class="columna principal">Campeon</th>
                    <th class="columna principal acciones">Acciones</th>
                </tr>
                @foreach ($torneos as $torneo)
                    <tr>
                        <td class="columna">{{ $torneo->id}}</td>
                        <td class="columna"><img src="{{ asset('storage').'/'.$torneo->Logo }}" class="escudo">{{ $torneo->nombreCompeticion }}</td>
                        <td class="columna">{{ $torneo->Edicion }}</td>
                        <td class="columna"><img src="{{ asset('storage').'/'.$torneo->Escudo }}" class="escudo">{{ $torneo->nombreEquipo }}</td>
                        <td class="columna editar-eliminar">
                            <a href="{{ url('Crud/Torneo/'.$torneo->id.'/edit') }}" class="boton editar">Editar</a> 
                            <form  action="{{ url('Crud/Torneo/'.$torneo->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Deseas borrar el torneo ??')" value="Borrar" class="boton borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>