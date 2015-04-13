@extends ('admin/layout')

@section ('title') book {{ $book->title }} @stop

@section ('content')

<h2>book #{{ $book->id }}</h2>

<p><b>Titulo:</b> {{ $book->title }}</p>
<p><b>Autor:</b> {{ $book->author }}</p>

<p>
  <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">
    Editar
  </a>    
</p>

{{ Form::model($book, array('route' => array('book.destroy', $book->id), 'method' => 'DELETE'), array('role' => 'form')) }}
  {{ Form::submit('Eliminar usuario', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}

@stop