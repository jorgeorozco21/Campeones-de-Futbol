<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Equipos</title>
        <link rel="stylesheet" href="{{ asset('css/styles_crud.css') }}">
    </head>
    <body>
        <main>
            <table>
                <tr>
                    <th>#</th>
                    <th>Escudo</th>
                    <th>Nombre del Equipo</th>
                    <th>Colores</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($Equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->id}}</td>
                        <td><img src="{{ asset('storage').'/'.$equipo->Escudo }}"></td>
                        <td>{{ $equipo->Nombre }}</td>
                        <td>{{ $equipo->Colores }}</td>
                        <td>
                            <a href="{{ url('Crud/Equipo/'.$equipo->id.'/edit') }}">Editar</a> 
                            | 
                            <form  action="{{ url('Crud/Equipo/'.$equipo->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Deseas borrar al equipo ??')" value="Borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>