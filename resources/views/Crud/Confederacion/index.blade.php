<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confederaciones</title>
        <link rel="stylesheet" href="{{ asset('css/styles_crud.css') }}">
    </head>
    <body class="body-especial">
        <main class="main-especial">
            <div class="funciones">
                <!-- Aqui es donde se hace el buscador -->
                <!--<form>
                    <input type="text">
                </form>-->
                <a href="{{ url('Crud/Confederacion/create') }}" class="boton agregar">+ Agregar</a>
                <a href="{{ url('Crud') }}" class="boton regresar">Regresar</a>
            </div>
            <table class="informacion">
                <tr>
                    <th class="columna principal">#</th>
                    <th class="columna principal">Logo</th>
                    <th class="columna principal">Nombre Confederacion</th>
                    <th class="columna principal">Descripcion</th>
                    <th class="columna principal acciones">Acciones</th>
                </tr>
                @foreach ($Confederaciones as $confederacion)
                    <tr>
                        <td class="columna">{{ $confederacion->id}}</td>
                        <td class="columna"><img src="{{ asset('storage').'/'.$confederacion->Logo }}" class="escudo"></td>
                        <td class="columna">{{ $confederacion->Nombre }}</td>
                        <td class="columna">{{ $confederacion->Descripcion }}</td>
                        <td class="columna editar-eliminar">
                            <a href="{{ url('Crud/Confederacion/'.$confederacion->id.'/edit') }}" class="boton editar">Editar</a> 
                            <form  action="{{ url('Crud/Confederacion/'.$confederacion->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Deseas borrar la confederacion ??')" value="Borrar" class="boton borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>