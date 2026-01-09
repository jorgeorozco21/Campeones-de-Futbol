<label for="competicion">Competicion</label>
<select id="competicion" name="ID_Competicion">
    @foreach ($competiciones as $competicion)
        <option value="{{ $competicion->id }}">{{ $competicion->Nombre }}</option>
    @endforeach
</select>
<label for="edicion">Edicion</label>
<input type="text" id="edicion" name="Edicion">
<label for="equipo">Campeon</label>
<select id="equipo" name="ID_Equipo">
    @foreach ($equipos as $equipo)
        <option value="{{ $equipo->id }}">{{ $equipo->Nombre }}</option>
    @endforeach
</select>
<input type="submit" value="{{ $modo }} Datos" class="boton editar">