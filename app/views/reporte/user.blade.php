@extends ('reporte/pdf')

@section ('content')




	<div class="table">
		<table class="responsive">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Cedula</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->lastname}}</td>
					<td>{{$user->cedula}}</td>
					<td>{{$user->email}}</td>
					
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	




@stop
