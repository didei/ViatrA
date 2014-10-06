<?php
	include '../include/conexion.php';
	$conexion = Conectar("dideimx_ifai");
	
	$servidor = $_POST['servidor'];
	$usuario = $_POST['usuario'];
	
	if($servidor == '' || $usuario == ''){
		exit;
	}
	
	$sql = "SELECT id_seguimiento FROM seguimientos WHERE id_servidor = '$servidor' AND id_usuario = '$usuario'";
	$res = $conexion->query($sql);
	$resp = 0;
	if($res->num_rows > 0){
		$row = $res->fetch_array();
		$sql_baja = "DELETE FROM seguimientos WHERE id_seguimiento = ".$row['id_seguimiento'];
		if($res_baja = $conexion->query($sql_baja))
			$resp = 1;
	}else{
		$sql_seguir = "INSERT INTO seguimientos(id_servidor, id_usuario) VALUES ('$servidor','$usuario')";
		if($res_seguir = $conexion->query($sql_seguir))
			$resp = 1;
	}
	
	echo $resp;
?>