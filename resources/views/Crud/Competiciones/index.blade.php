<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Competiciones</title>
        <link rel="stylesheet" href="{{ asset('css/styles_crud.css') }}">
    </head>
    <body class="body-especial">
        <main class="main-especial">
            <div class="funciones">
                <!-- Aqui es donde se hace el buscador -->
                <!--<form>
                    <input type="text">
                </form>-->
                <a href="{{ url('Crud/Competicion/create') }}" class="boton agregar">+ Agregar</a>
                <a href="{{ url('Crud') }}" class="boton regresar">Regresar</a>
            </div>
            <table class="informacion">
                <tr>
                    <th class="columna principal">#</th>
                    <th class="columna principal">Logo</th>
                    <th class="columna principal">Nombre</th>
                    <th class="columna principal">Tipo</th>
                    <th class="columna principal">Pais</th>
                    <th class="columna principal">Confederacion</th>
                    <th class="columna principal acciones">Acciones</th>
                </tr>
                @foreach ($competiciones as $competicion)
                    <tr>
                        <td class="columna">{{ $competicion->id}}</td>
                        <td class="columna"><img src="{{ asset('storage').'/'.$competicion->logoCompeticion }}" class="escudo"></td>
                        <td class="columna">{{ $competicion->nombreCompeticion }}</td>
                        <td class="columna">{{ $competicion->Tipo }}</td>
                        <td class="columna"><img src="{{ asset('storage').'/'.$competicion->Bandera }}" class="escudo">{{ $competicion->nombrePais }}</td>
                        <td class="columna"><img src="{{ asset('storage').'/'.$competicion->logoConfederacion }}" class="escudo">{{ $competicion->nombreConfederacion }}</td>
                        <td class="columna editar-eliminar">
                            <a href="{{ url('Crud/Competicion/'.$competicion->id.'/edit') }}" class="boton editar">Editar</a> 
                            <form  action="{{ url('Crud/Competicion/'.$competicion->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Deseas borrar la competicion ??')" value="Borrar" class="boton borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>