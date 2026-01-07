Lugar para crear

<form action="{{ url('Crud/Equipo') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    @include ('Crud.Equipo.form')
</form>