<label for="nombre">Nombre</label>
<input type="text" name="Nombre" id="nombre" value="{{ isset($pais->Nombre)?$pais->Nombre:old('Nombre') }}">
<label for="bandera">Bandera</label>
<input type="text" name="Bandera" id="bandera" value="{{ isset($pais->Bandera)?$pais->Bandera:old('Bandera') }}">
<input type="submit" value="{{ $modo }} Datos" class="boton editar">  