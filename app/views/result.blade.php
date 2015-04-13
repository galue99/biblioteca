@extends('../layouts')

@section ('content')

<div class="spacing">
	@foreach($resultado as $book)
		<div class="row">
			<div class="col-lg-4">
				<img src="assets/imgs/{{$book->cover}}" width="100%" alt="">
			</div>
			<div class="col-lg-8 well">
				<div class="col-lg-12">
					<div class="col-xs-2">
						<h4>Title:</h4>	
					</div>
					<div class="col-xs-10 text-center">
						{{$book->title}}
					</div>
				</div>
				<div class="col-lg-12">
					<div class="col-xs-2">
						<h4>Cota:</h4>	
					</div>
					<div class="col-xs-10 text-center">
						<h5>{{$book->cota}}</h5>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="col-xs-2">
						<h4>Author:</h4>	
					</div>
					<div class="col-xs-10 text-center">
						<h5>{{$book->author}}</h5>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="col-xs-2">
						<h4>Ubicación:</h4>	
					</div>
					<div class="col-xs-10 text-center">
						<h5>{{$book->ubicacion}}</h5>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<br>
			</div>
		</div>
	@endforeach	
</div>

@stop