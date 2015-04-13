<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Biblioteca</title>

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('assets/css/bootstrap.css'); }}

    {{ HTML::style('assets/css/simple-sidebar.css'); }}
    {{ HTML::style('assets/css/style.css'); }}



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<section class="content">
		<article class="col-xs-3">
			<div class="col-xs-8">
				<p><h3>Hola </h3>
				<h3>Administración</h3></p>
			</div>

			<nav class="navbar navbar-default sidebar azul_oscuro" role="navigation">
			    <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>      
			    </div>
			    <div class="collapse navbar-collapse azul_oscuro" id="bs-sidebar-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li @if(URL::current() . "/" == URL::to('prestamos')) class="active" @endif><a href="{{URL::to('/prestamos')}}">Iniciar Prestamo<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>      
			        <li><a href="#">Iniciar Devolución<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>        
			        <li><a href="#">Lista de Usuarios<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
			        <li><a href="book">Lista de Libros<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></span></a></li>
			        <li><a href="{{URL::to('/logout')}}">Salir<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
			      </ul>
			    </div>
			  </div>
			</nav>
		</article>
		<article class="col-xs-9">
			<div class="col-lg-12">
				<div class="col-xs-2 pull-left">
					{{ HTML::image('assets/img/escudo.png','alt', array( 'width' => 100)); }}
				</div>
				<div class="col-xs-10 pull-left">
					<h1><span class="text-left azul_medio">Biblioteca Virtual</span> <span class="azul_oscuro">Maria Quesada</span></h1>
					<p class="azul_oscuro"><b>Escuela Basica Nacional Norman Prieto Ramos</b></p>
				</div>	
			</div>
			<div class="col-lg-10">
				@yield('content')
			</div>

		</article>
	</section>
	


</body>

</html>
