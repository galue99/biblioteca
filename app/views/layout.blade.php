<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="" description="" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Biblioteca</title>
	{{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
	{{ HTML::style('assets/css/style.css') }}
</head>
<body>
	<section class="headers">
		<div class="col-lg-12">
			<div class="col-xs-4 text-right">
				<img src="assets/img/escudo.png" width="40%" alt="" class="image-responsive">
			</div>
			<div class="col-xs-8 pull-left">
				<h1><span class="text-center azul_medio">Biblioteca Virtual</span> <span class="azul_oscuro">Maria Quesada</span></h1>
				<p class="azul_oscuro"><b>Escuela Basica Nacional Norman Prieto Ramos</b></p>
			</div>	
		</div>
	</section>
	@yield('content')

	
	<footer class="footer">
		<p class="text-center">Creado desde el año 2015 - @Copyright 2015 </p>
	</footer>

	{{ HTML::script('assets/js/bootstrap.min.js') }}
</body>
</html>