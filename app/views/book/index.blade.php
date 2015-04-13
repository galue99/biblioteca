@extends('../layouts')

@section ('content')

<div class="text-right">
  <a href="{{ route('book.create') }}" title="" class="btn btn-info" role="button" >Crear Nuevo Libro</a>  
</div>

<div class="col-xs-12 spacing">
  <h1>Lista de Libros</h1>
  <div class="table">
    <table class="table table-striped">
      <tr>
          <th>Titulo</th>
          <th>Author</th>
          <th>Ubicacion</th>
          <th>Disponibilidad</th>
          <th>Mostrar</th>
          <th>Editar</th>
          <th>Eliminar</th>
      </tr>
      @foreach ($books as $book)
      <tr>
          <td>{{ $book->title }}</td>
          <td>{{ $book->author }}</td>
          <td>{{ $book->ubicacion }}</td>
          <td>{{ $book->disponibilidad }}</td>
          <td><a href="{{ route('book.show', $book->id) }}" title="" class="btn btn-info" role="button" >Ver</a></td>
          <td><a href="{{ route('book.edit', $book->id) }}" title="" class="btn btn-primary" role="button" >Editar</a></td>
          <td><a href="{{ route('book.destroy', $book->id) }}" title="" class="btn btn-danger" role="button" >Eliminar</a></td>
      </tr>
      @endforeach
    </table>
    {{ $books->links() }}
  </div> 


</div>
@stop