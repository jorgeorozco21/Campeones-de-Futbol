<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Competicion</title>
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
        <a href="{{ url('Crud/Competicion/') }}" class="boton agregar">Regresar</a>
        <main class="main-especial">
            <div class="formulario-crear-especial">
                <h2 style="text-align: center;">Editar Competicion</h2>
                <form action="{{ url('Crud/Competicion/'.$competicion->id) }}" method="post">
                    @csrf
                    {{ method_field('PATCH') }}
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="Nombre" value="{{ isset($competicion->Nombre)?$competicion->Nombre:old('Nombre') }}">
                    <label for="logo">Logo</label>
                    <input type="text" id="logo" name="Logo" value="{{ isset($competicion->Logo)?$competicion->Logo:old('Logo') }}">
                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion" name="Descripcion" class="textarea-especial">
                        {{ isset($competicion->Descripcion)?$competicion->Descripcion:old('Descripcion') }}
                    </textarea>
                    <label for="tipo">Tipo</label>
                    <select id="tipo" name="Tipo">
                        <option value="Liga" {{ ($competicion->Tipo == 'Liga')?'selected':'' }}>Liga</option>
                        <option value="Copa" {{ ($competicion->Tipo == 'Copa')?'selected':'' }}>Copa</option>
                        <option value="SuperCopa" {{ ($competicion->Tipo == 'SuperCopa')?'selected':'' }}>Super Copa</option>
                        <option value="Liguilla" {{ ($competicion->Tipo == 'Liguilla')?'selected':'' }}>Liguilla</option>
                    </select>
                    <label for="pais">Pais</label>
                    <select id="pais" name="ID_Pais">
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->id }}" {{ ($competicion->ID_Pais == $pais->id)?'selected':'' }}>{{ $pais->Nombre }}</option>
                        @endforeach
                    </select>
                    <label for="confederacion">Confederacion</label>
                    <select id="confederacion" name="ID_Confederacion">
                        @foreach ($confederaciones as $confederacion)
                            <option value="{{ $confederacion->id }}" {{ ($competicion->ID_Confederacion == $confederacion->id)?'selected':'' }}>{{ $confederacion->Nombre }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Editar Datos" class="boton editar">
                </form>
            </div>
        </main>
        @vite('resources/js/alertas.js')
    </body>
</html>