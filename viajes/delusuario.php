<?php
	session_start();
	include '../include/conexion.php';
	$rol=$_SESSION['rol'];
	if($rol==0){
		$conexion = Conectar("dideimx_ifai");
		$usuario = clear_string($conexion,$_GET['usr']);
		$accion = clear_string($conexion,$_GET['acc']);
		if($conexion->query("UPDATE usuarios SET estatus ='$accion' WHERE uid = '$usuario'")){
			if($accion == 1)
				echo "<script type='text/javascript'>alert('Usuario Bloqueado')</script>";
			else
				echo "<script type='text/javascript'>alert('Usuario Desbloqueado')</script>";
			echo "<script type='text/javascript'>document.location='index.php?id=3'</script>";
		}
	}
?>