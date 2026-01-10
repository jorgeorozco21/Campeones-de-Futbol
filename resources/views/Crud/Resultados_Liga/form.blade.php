<label for="equipo">Equipo</label>
<select id="equipo" name="ID_Equipo">
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
<label for="ganados">Partidos Ganados</label>
<input type="number" id="ganados" name="Ganados" value="0">
<label for="perdidos">Partidos Perdidos</label>
<input type="number" id="perdidos" name="Perdidos" value="0">
<label for="empatados">Partidos Empatados</label>
<input type="number" id="empatados" name="Empates" value="0">
<label for="ga">Goles a Favor</label>
<input type="number" id="ga" name="GA" value="0">
<label for="gc">Goles en Contra</label>
<input type="number" id="gc" name="GC" value="0">
<label for="dg ">Diferencia de Gol</label>
<input type="number" id="dg" name="DG" value="0">
<label for="puntos">Puntos</label>
<input type="number" id="puntos" name="Puntos" value="0">
<label for="clasificacion">Clasificacion</label>
<select id="clasificacion" name="Clasificacion">
    <option value="Sin Clasificacion">Sin Clasificacion</option>
    <option value="Descenso">Descenso</option>
    <option value="Campeon">Campeon</option>
    <option value="Champions">Champions</option>
    <option value="Europa">Europa</option>
    <option value="Conferens">Conferens</option>
    <option value="Recopa">Recopa</option>
</select>
<input type="hidden" value="0" name="ID_Resultado">
<input type="submit" class="boton editar" value="{{ $modo }} Datos">