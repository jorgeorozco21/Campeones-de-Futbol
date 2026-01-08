<label for="nombre">Nombre</label>
<input type="text" name="Nombre" id="nombre" value="{{ isset($equipo->Nombre)?$equipo->Nombre:old('Nombre') }}">
<label for="escudo">Escudo</label>
<input type="text" id="escudo" value="{{ isset($equipo->Escudo)?$equipo->Escudo:old('Escudo') }}" name="Escudo">
<label for="colores">Colores</label>
<input type="text" name="Colores" id="colores" value="{{ isset($equipo->Colores)?$equipo->Colores:old('Colores') }}">
<input type="submit" value="{{$modo}} Datos" class="boton editar">