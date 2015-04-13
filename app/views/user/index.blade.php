@extends('../layouts')

@section ('content')

<div class="text-right">
  <a href="{{ route('user.create') }}" title="" class="btn btn-info" role="button" >Crear Nuevo Usuario</a>
  <a href="{{ URL::to('/reporteUsuarios')}}" title="" class="btn btn-info" role="button" >Imprimir Lista de Usuario</a>
</div>


<div class="col-xs-12 spacing">
  <h1>Lista de Usuarios</h1>
  <div class="table">
    <table class="table table-striped">
      <tr>
          <th>Nombre Completo</th>
          <th>Cedula</th>
          <th>Telefono</th>
          <th>Email</th>
          <th>Mostrar</th>
          <th>Editar</th>
          <th>Eliminar</th>
      </tr>
      @foreach ($users as $user)
      <tr>
          <td>{{ $user->name }} {{ $user->lastname }}</td>
          <td>{{ $user->cedula }}</td>
          <td>{{ $user->telefono }}</td>
          <td>{{ $user->email }}</td>
          <td><a href="{{ route('user.show', $user->id) }}" title="" class="btn btn-info" role="button" >Ver</a></td>
          <td><a href="{{ route('user.edit', $user->id) }}" title="" class="btn btn-primary" role="button" >Editar</a></td>
          <td><a href="{{ route('user.destroy', $user->id) }}" title="" class="btn btn-danger" role="button" >Eliminar</a></td>
      </tr>
      @endforeach
    </table>
    {{ $users->links() }}
  </div> 


</div>
@stop