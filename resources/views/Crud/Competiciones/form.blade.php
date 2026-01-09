<label for="nombre">Nombre</label>
<input type="text" id="nombre" name="Nombre">
<label for="logo">Logo</label>
<input type="text" id="logo" name="Logo">
<label for="descripcion">Descripcion</label>
<textarea id="descripcion" name="Descripcion" class="textarea-especial">
</textarea>
<label for="tipo">Tipo</label>
<select id="tipo" name="Tipo">
    <option value="Liga">Liga</option>
    <option value="Copa">Copa</option>
    <option value="SuperCopa">Super Copa</option>
    <option value="Liguilla">Liguilla</option>
</select>
<label for="pais">Pais</label>
<select id="pais" name="ID_Pais">
    @foreach ($paises as $pais)
        <option value="{{ $pais->id }}">{{ $pais->Nombre }}</option>
    @endforeach
</select>
<label for="confederacion">Confederacion</label>
<select id="confederacion" name="ID_Confederacion">
    @foreach ($confederaciones as $confederacion)
        <option value="{{ $confederacion->id }}">{{ $confederacion->Nombre }}</option>
    @endforeach
</select>
<input type="submit" value="{{ $modo }} Datos" class="boton editar">
