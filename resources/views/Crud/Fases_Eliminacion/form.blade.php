<label for="equipo1">Equipo 1</label>
<select id="equipo1" name="ID_Equipo1">
    @foreach ($equipos as $equipo)
        <option value="{{ $equipo->id }}">{{ $equipo->Nombre }}</option>
    @endforeach
</select>
<label for="equipo2">Equipo 2</label>
<select id="equipo2" name="ID_Equipo2">
    @foreach ($equipos as $equipo)
        <option value="{{ $equipo->id }}">{{ $equipo->Nombre }}</option>
    @endforeach
</select>
<label for="torneo">Torneo</label>
<select id="torneo" name="ID_Torneo">
    @foreach ($torneos as $torneo)
        <option value="{{ $torneo->id }}">{{ $torneo->Nombre }} {{ $torneo->Edicion }}</option>
    @endforeach
</select>
<label for="tipo">Tipo de Eliminacion</label>
<select id="tipo" name="Tipo">
    <option value="eliminacionDirecta">Eliminacion Directa</option>
    <option value="idaVuelta">Ida y Vuelta</option>
    <option value="playOff">Play Off</option>
</select>
<label for="fase">Fase</label>
<select id="fase" name="Fase">
    <option value="1">Final</option>
    <option value="2">SemiFinal</option>
    <option value="4">4tos de Final</option>
    <option value="8">8vos</option>
    <option value="16">16vos</option>
    <option value="32">32vos</option>
</select>
<label for="llave">Llave</label>
<input type="text" id="llave" name="Llave">
<label for="resultado1">Resultado 1</label>
<input type="text" id="resultado1" name="Resultado1">
<label for="resultado2">Resultado 2</label>
<input type="text" id="resultado2" name="Resultado2">
<label for="resultado3">Resultado 3</label>
<input type="text" id="resultado3" name="Resultado3">
<input type="hidden" name="ID_Resultado" value="0">
<input type="submit" value="{{ $modo }} Datos" class="boton editar">