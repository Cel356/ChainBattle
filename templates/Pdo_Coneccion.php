<?Php 
try{
	$pdo= new PDO('mysql:host=localhost;dbname=chain_battle;charset=utf8','root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e){
	$salida='Error de conexión'. $e;
}
?>