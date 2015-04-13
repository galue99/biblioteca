@extends ('layouts')

@section ('content')
	
	<div class="spacing">

		<h2>Prestamo de Libro</h2>
		
		{{ Form::open(array('url' => 'prestar', 'method' => 'POST'), array('role' => 'form')) }}

		  <div class="row">
		    <div class="form-group col-md-6">
		    	{{ Form::label('isbn', 'Isbn') }}
		    	<input type="text" name="" value="{{$resultado[0]['isbn']}}" placeholder="" class="form-control">
		    </div>
		   	<div class="form-group col-md-6">
		   		{{ Form::label('isbn', 'Cota') }}
		     	<input type="text" name="" value="{{$resultado[0]['cota']}}" placeholder="" class="form-control"> 
		    </div>
		    <div class="form-group col-md-6">
		      {{ Form::label('title', 'Title') }}
		     	<input type="text" name="title" value="{{$resultado[0]['title']}}" placeholder="" class="form-control"> 
		    </div>
		    <div class="form-group col-md-6">
		    	{{ Form::label('author', 'Autor') }}
		     	<input type="text" name="author" value="{{$resultado[0]['author']}}" placeholder="" class="form-control">  
		    </div>
		    <div class="form-group col-md-6">
		    	{{ Form::label('fecha de Prestamo', 'Fecha de Prestamo') }}
		     	<input type="text" name="author" value="{{date('Y-m-d')}}" placeholder="" class="form-control">  
		    </div>
		    <div class="form-group col-md-6">
		    	{{ Form::label('Fecha de Devolución', 'Fecha de Devolución') }}
		     	<input type="text" name="author" value="{{date('Y-m-d', strtotime('+5 days'))}}" placeholder="" class="form-control">  
		    </div>

		  </div>
		     
		  
		{{ Form::close() }}
	</div>
	

@stop