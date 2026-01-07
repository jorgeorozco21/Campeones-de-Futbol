<form method="post" action="{{ url('Crud/Equipo/'.$equipo->id) }}" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include ('Crud.Equipo.form')
</form>