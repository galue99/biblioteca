<?php

if (is_ajax()){


	include 'conexion.php';

	$sql = "SELECT * FROM libro ORDER BY aut_nombre";
	$result = mysqli_query($con, $sql);
	$array_user = array();
	while($data = mysqli_fetch_assoc($result)){
	    $array_user[] = $data;
	};

	echo json_encode($array_user);

}


function is_ajax() {
return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
} 

?>