<?php
include 'conexion.php';

$sql = "SELECT * FROM prestamos ORDER BY fecha_salida";
$result = mysqli_query($con, $sql);
$array_user = array();
while($data = mysqli_fetch_assoc($result)){
    $array_user[] = $data;
};

echo json_encode($array_user);

?>