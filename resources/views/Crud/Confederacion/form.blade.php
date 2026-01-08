<label for="nombre">Nombre</label>
<input type="text" name="Nombre" value="{{ isset($confederacion->Nombre)?$confederacion->Nombre:old('Nombre') }}" id="nombre">
<label for="logo">Logo</label>
<input type="text" name="Logo" id="logo" value="{{ isset($confederacion->Logo)?$confederacion->Logo:old('Logo') }}">
<label for="descripcion">Descripcion</label>
<textarea id="descripcion" name="Descripcion">
    {{ isset($confederacion->Descripcion)?$confederacion->Descripcion:old('Descripcion') }}
</textarea>
<input type="submit" value="{{ $modo }} Datos" class="boton editar">