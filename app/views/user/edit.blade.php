@extends ('admin/layout')

<?php

    if ($user->exists):
        $form_data = array('route' => array('user.update', $user->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'user.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@section ('title') {{ $action }} Usuarios @stop

@section ('content')

<div class="spacing">
  <h1>{{ $action }} Usuarios</h1>

  <p>
    <a href="{{ route('user.index') }}" class="btn btn-info">Lista de usuarios</a>
  </p>

{{ Form::model($user, $form_data, array('role' => 'form')) }}

	@include ('admin/errors', array('errors' => $errors))

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
      {{ Form::label('Telefono', 'Telefono') }}
      {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Email', 'Dirección de E-mail') }}
      {{ Form::email('email', null, array('placeholder' => 'Dirección de E-mail', 'class' => 'form-control')) }}
    </div>
    {{ Form::hidden('password', null, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
    {{ Form::hidden('rol', null, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
  </div>
  {{ Form::button($action . ' usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

</div>
@stop