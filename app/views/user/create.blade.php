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
{{ Form::open(array('url' => 'user', 'method' => 'POST'), array('role' => 'form')) }}

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('Nombre', 'Nombre') }}
      {{ Form::text('name', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Apellido', 'Apellido') }}
      {{ Form::text('lastname', null, array('placeholder' => 'Apellido', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('cedula', 'Cedula') }}
      {{ Form::text('cedula', null, array('placeholder' => 'Cedula', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Password', 'Password') }}
      {{ Form::text('password', null, array('placeholder' => 'Password', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Telefono', 'Telefono') }}
      {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Email', 'Dirección de E-mail') }}
      {{ Form::email('email', null, array('placeholder' => 'Dirección de E-mail', 'class' => 'form-control')) }}
    </div>
        <div class="form-group col-md-4">
      <input type="hidden" name="rol" value="user">
    </div>
  </div>
  {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}


</div>
@stop