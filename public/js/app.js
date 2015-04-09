
var bibliotecaApp = angular.module('bibliotecaApp',[]);


bibliotecaApp.controller('listController', function($scope, $http) {

	$scope.libro="libro_nombre";
	$scope.libroid="libro_bar_id";
	$scope.autor="aut_nombre";
	$scope.catedra="catedra_nombre";
	$scope.editor="edit_nombre";


 $http.get('http://localhost/bibliotecaApp/public/js/ajax/getLibros.php')
        .success(function(data) 
        {                   
           
            $scope.libros = data;
                               
        }).error(function(){alert('Imposible cargar los libros para la busqueda')});

});

bibliotecaApp.controller('prestController', function($scope, $http){

		$scope.setSalida = function(){

			$scope.fecha_salida= $('#fecha_salida').val();

		}


	

$http.get('http://localhost/bibliotecaApp/public/js/ajax/getPrestamos.php')
	.success(function(data)
		{
			
			$scope.prestamos = data;

		}).error(function(){alert('Imposible cargar los prestamos para la busqueda')});

});