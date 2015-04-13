@extends('admin/layout')


@section ('content')
<div class="spacing">
@if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif


{{ Form::open(array('url' => 'book', 'files' => true, 'method' => 'POST'), array('role' => 'form')) }}


  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('isbn', 'Isbn') }}
      {{ Form::text('isbn', null, array('placeholder' => '#', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('cod_idioma', 'Codigo Idioma') }}
      {{ Form::text('cod_idioma', null, array('placeholder' => '#', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', null, array('placeholder' => '#', 'class' => 'form-control')) }}
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('cota', 'Cota') }}
      {{ Form::text('cota', null, array('placeholder' => '#', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('author', 'Author') }}
      {{ Form::text('author', null, array('placeholder' => '#', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('tematica', 'Tematica') }}
      {{ Form::text('tematica', null, array('placeholder' => '#', 'class' => 'form-control')) }}
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('ubicacion', 'Ubicación') }}
      {{ Form::text('ubicacion', null, array('placeholder' => '#', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('cover', 'Imagen') }}
      {{ Form::file('cover', null, array('placeholder' => '#', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('disponibilidad', 'Disponibilidad') }}
      {{ Form::text('disponibilidad', null, array('placeholder' => '#', 'class' => 'form-control')) }}
    </div>
  </div>
  {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}
</div>
@stop