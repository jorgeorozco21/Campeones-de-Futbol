<label for="nombre">Nombre</label>
<input type="text" name="Nombre" id="nombre" required value="{{ $equipo->Nombre }}">
<br>
<label for="escudo">Escudo</label>
<img src="{{ asset('storage').'/'.$equipo->Escudo }}">
<input type="file" name="Escudo" id="escudo" value="">
<br>
<label for="colores">Colores</label>
<input type="text" name="Colores" id="colores" value="{{ $equipo->Colores }}">
<br>
<input type="submit" value="Guardar Datos">