<?php
	include '../include/conexion.php';
	$conexion = Conectar("dideimx_ifai");

	$nombre                = clear_string($conexion,$_POST['Nombre']); 
	$papellido             = clear_string($conexion,$_POST['papellido']);  
	$sapellido             = clear_string($conexion,$_POST['sapellido']);  
	$tpersonal             = clear_string($conexion,$_POST['tpersonal']);  
	$cargo                 = clear_string($conexion,$_POST['cargo']);  
	$scargo                = clear_string($conexion,$_POST['scargo']);  
	$uadministrativa       = clear_string($conexion,$_POST['uadministrativa']);  
	$grupo                 = clear_string($conexion,$_POST['grupo']);  
	$puesto                = clear_string($conexion,$_POST['puesto']);  
	$email                 = clear_string($conexion,$_POST['email']);  
	$pass                  = clear_string($conexion,$_POST['pass']);  
	$fecha				   = date("Y-m-d");
	$consulta ="SELECT * FROM usuarios WHERE email = '$email'";
	$searchsame=$conexion->query($consulta);
	if($searchsame->num_rows >0){
		echo $searchsame->num_rows;
	}
	else{
		$consulta ="INSERT INTO usuarios (nombre, primer_apellido, segundo_apellido,password,email,rol,fecha_alta)
					VALUES ('$nombre','$papellido','$sapellido',MD5('$pass'),'$email','1','$fecha')";
		if($adduser=$conexion->query($consulta)){
			$consulta="SELECT uid FROM usuarios WHERE email = '$email'";
			$usuario=$conexion->query($consulta);
			$usr=$usuario->fetch_array();
			$uid=$usr['uid'];
			$consulta ="INSERT INTO servidores (uid, tipo_personal, cargo, cargo_superior, unidad_administrativa, grupo, nombre_puesto)
						VALUES ('$uid','$tpersonal','$cargo','$scargo','$uadministrativa','$grupo','$puesto')";
			if($addservidor=$conexion->query($consulta)){
				echo 2;
			}
		}
	}
?>