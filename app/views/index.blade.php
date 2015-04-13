@extends ('layout')

@section ('content')

	<section class="col-lg-12 body">
		<article class="col-lg-6 ">
			<div class="col-lg-12">
				<img src="assets/img/images.png" width="100%" alt="" class="image-responsive">
			</div>
		</article>
		<article class="col-lg-4">
			<div class="form-login col-lg-offset-2">
				{{ Form::open(array('url' => 'login', 'files' => true, 'method' => 'POST'), array('role' => 'form')) }}
				<h4 class="text-center azul_claro"><b>LOGIN</b></h4>
				{{ Form::label('usuario', 'Usuario:') }}
      			{{ Form::email('email', null, array('placeholder' => 'Usuario', 'class' => 'form-control')) }}
            	</br>
            	{{ Form::label('password', 'Password:') }}
      			{{ Form::password('password', array('class'=>'form-control','placeholder'=>'Password')) }} 
            	</br>
            	<div class="wrapper">
		            <span class="group-btn"> 
		            {{ Form::button('Enviar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}      
		             <p><a href="{{URL::to('user')}}" title="">Nuevo Usuario</a></p> 
		            </span>
            	</div>
            	{{ Form::close() }}
            	@if(Session::has('mensaje_errors'))
            		<div class="alert alert-danger">{{ Session::get('mensaje_errors') }}</div>
        		@endif
            </div>
            <div class="col-lg-12">
            	<br>
            </div>
		</article>
	</section>

@stop