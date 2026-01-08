<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Equipos</title>
        <link rel="stylesheet" href="{{ asset('css/styles_crud.css') }}">
    </head>
    <body class="body-especial">
        <main class="main-especial">
            <div>
            </div>
            <div class="funciones">
                <!-- Aqui es donde se hace el buscador -->
                <!--<form>
                    <input type="text">
                </form>-->
                <a href="{{ url('Crud/Equipo/create') }}" class="boton agregar">+ Agregar</a>
                <a href="{{ url('Crud') }}" class="boton regresar">Regresar</a>
            </div>
            <table class="informacion">
                <tr>
                    <th class="columna principal">#</th>
                    <th class="columna principal">Escudo</th>
                    <th class="columna principal">Nombre del Equipo</th>
                    <th class="columna principal">Colores</th>
                    <th class="columna principal acciones">Acciones</th>
                </tr>
                @foreach ($Equipos as $equipo)
                    <tr>
                        <td class="columna">{{ $equipo->id}}</td>
                        <td class="columna"><img src="{{ asset('storage').'/'.$equipo->Escudo }}" class="escudo"></td>
                        <td class="columna">{{ $equipo->Nombre }}</td>
                        <td class="columna">{{ $equipo->Colores }}</td>
                        <td class="columna editar-eliminar">
                            <a href="{{ url('Crud/Equipo/'.$equipo->id.'/edit') }}" class="boton editar">Editar</a> 
                            <form  action="{{ url('Crud/Equipo/'.$equipo->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Deseas borrar al equipo ??')" value="Borrar" class="boton borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>