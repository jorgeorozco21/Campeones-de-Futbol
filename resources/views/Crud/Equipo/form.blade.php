<label for="nombre">Nombre</label>
<input type="text" name="Nombre" id="nombre" value="{{ isset($equipo->Nombre)?$equipo->Nombre:old('Nombre') }}">
<br>
<label for="escudo">Escudo</label>
<input type="file" name="Escudo" id="escudo" value="">
<br>
<label for="colores">Colores</label>
<input type="text" name="Colores" id="colores" value="{{ isset($equipo->Colores)?$equipo->Colores:old('Colores') }}">
<br>
<input type="submit" value="{{$modo}} Datos" class="boton editar">