@extends ('layouts')

@section ('content')

<div class="spacing">

	<h2>Busquedad de Libro</h2>
	{{ Form::open(array('url' => 'search', 'method' => 'POST'), array('role' => 'form')) }}

	  <div class="row">
	    <div class="row">
		    <div class="form-group col-md-8">
		      {{ Form::label('author', 'Autor') }}
		      {{ Form::text('author', null, array('placeholder' => 'Ingrese el Nombre del Author', 'class' => 'form-control')) }}
		    </div>
		   	<div class="form-group col-md-4">
		   		<br>
		      {{ Form::button('Buscar', array('type' => 'submit', 'class' => 'btn btn-primary')) }} 
		    </div>
		    <div class="form-group col-md-8">
		      {{ Form::label('title', 'Title') }}
		      {{ Form::text('title', null, array('placeholder' => 'Ingrese el Title', 'class' => 'form-control')) }}
		    </div>
		    <div class="form-group col-md-4">
		    	<br>
		      {{ Form::button('Buscar', array('type' => 'submit', 'class' => 'btn btn-primary')) }} 
		    </div>
		  </div>
	  </div>  
	  
	{{ Form::close() }}

</div>

@stop