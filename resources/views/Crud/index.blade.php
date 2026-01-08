<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crud</title>
        <!--<script src="https://cdn.tailwindcss.com"></script>-->
        <link rel="stylesheet" href="{{ asset('css/styles_crud.css') }}"> 
    </head>
    <body>
        <main>
            <div class="encabezado">
                <h2>Bienvenido al Crud</h2>
            </div>
            <div class="texto">
                <h3 class="info">Selecciona la tabla en que deseas realizar un proceso:</h3>
                <div>
                    <ul>
                        <li><a href="{{ url("Crud/Equipo/") }}" class="link">Equipos</a></li>
                        <li><a href="{{ url("Crud/Confederacion/") }}" class="link">Confederaciones</a></li>
                        <li><a href="" class="link"></a></li>
                        <li><a href="" class="link"></a></li>
                        <li><a href="" class="link"></a></li>
                        <li><a href="" class="link"></a></li>
                        <li><a href="" class="link"></a></li>
                        <li><a href="" class="link"></a></li>
                        <li><a href="" class="link"></a></li>
                        <li><a href="" class="link"></a></li>
                    </ul>
                </div>
            </div>
        </main>
    </body>
</html>