<?php  
	require '../templates/Pdo_Coneccion.php';
	require '../class/manageBD.php';

	$table="types";
	$column	= "name_type";

	$manageBD_types = new manageBD($pdo ,$table ,$column);
	$array = array('name_type' => trim('tipo2') );

	$manageBD_types->insert($array);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
nada
</body>
</html>
