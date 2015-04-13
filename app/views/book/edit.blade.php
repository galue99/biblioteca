@extends ('admin/layout')

<?php

    if ($book->exists):
        $form_data = array('route' => array('book.update', $book->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'book.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@section ('title') {{ $action }} Libros @stop

@section ('content')

<div class="spacing">
  <h1>{{ $action }} Usuarios</h1>

  <p>
    <a href="{{ route('book.index') }}" class="btn btn-info">Lista de Libros</a>
  </p>

{{ Form::model($book, $form_data, array('role' => 'form')) }}

	@include ('admin/errors', array('errors' => $errors))

  <div class="row">
        <div class="form-group col-md-4">
      {{ Form::label('isbn', 'Isbn') }}
      {{ Form::text('isbn', null, array('placeholder' => 'Isbn', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('cod_idioma', 'Codigo Idioma') }}
      {{ Form::text('cod_idioma', null, array('placeholder' => 'Codigo de Idioma', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', null, array('placeholder' => 'Titulo', 'class' => 'form-control')) }}
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('cota', 'Cota') }}
      {{ Form::text('cota', null, array('placeholder' => 'Cota', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('author', 'Author') }}
      {{ Form::text('author', null, array('placeholder' => 'Author', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('tematica', 'Tematica') }}
      {{ Form::text('tematica', null, array('placeholder' => 'Tematica', 'class' => 'form-control')) }}
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('ubicacion', 'Ubicación') }}
      {{ Form::text('ubicacion', null, array('placeholder' => 'Ubicacion', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('cover', 'Imagen') }}
      {{ Form::file('cover', null, array('placeholder' => '#', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('disponibilidad', 'Disponibilidad') }}
      {{ Form::text('disponibilidad', null, array('placeholder' => 'Disponibilidad', 'class' => 'form-control')) }}
    </div>
  </div>
  {{ Form::button($action . ' Libro', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

</div>
@stop