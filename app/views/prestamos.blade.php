@extends ('layouts')

@section ('content')
	
	<div class="spacing">

		<h2>Prestamo de Libro</h2>
		
		{{ Form::open(array('url' => 'prestamo', 'files' => true, 'method' => 'POST'), array('role' => 'form')) }}

		  <div class="row">
		    <div class="form-group col-md-8">
		      {{ Form::label('cota', 'Cota') }}
		      {{ Form::text('cota', null, array('placeholder' => 'Ingrese la Cota', 'class' => 'form-control')) }}
		    </div>
		   	<div class="form-group col-md-4">
		   		<br>
		      {{ Form::button('Buscar', array('type' => 'submit', 'class' => 'btn btn-primary')) }} 
		    </div>
		    <div class="form-group col-md-8">
		      {{ Form::label('isbn', 'Isbn') }}
		      {{ Form::text('isbn', null, array('placeholder' => 'Ingrese el ISBN', 'class' => 'form-control')) }}
		    </div>
		    <div class="form-group col-md-4">
		    	<br>
		      {{ Form::button('Buscar', array('type' => 'submit', 'class' => 'btn btn-primary')) }} 
		    </div>
		  </div>
		     
		  
		{{ Form::close() }}
	</div>
	

@stop