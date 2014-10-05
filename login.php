<?php
	session_start();
	include_once("./include/conexion.php");
	$conexion = Conectar("dideimx_ifai");
	
	$email = clear_string($conexion,$_POST['email']);
	$pass = md5(clear_string($conexion,$_POST['pass']));
	
	if($email=="" || $pass == ""){
		exit;
	}
	
	$sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$pass' AND estatus= '0'";
	if($res = $conexion->query($sql)){
		$num = $res->num_rows;		
	}
	
	if($num==1){
		$row = $res->fetch_assoc();
		$_SESSION['uid'] = $row['uid'];
		list($pname, $sname) = explode(" ", $row['nombre']);
		$_SESSION['name-user'] = $pname." ".$row['primer_apellido'];
		$_SESSION['rol'] = $row['rol'];
		echo $row['rol'];
	}else{
		echo -1;
	}
	
	$res->close();
	$conexion->close();
?>