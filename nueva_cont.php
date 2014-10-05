<?php 
	include_once("./include/conexion.php");
	$conexion = Conectar();
	
	$pass = clear_string($conexion,$_POST['pass']);
	$pass2 = clear_string($conexion,$_POST['pass2']);
	$uid = clear_string($conexion,$_POST['uid']);
	
	if($pass=='' || $pass2==''){
		exit;
	}
	
	if($pass!=$pass2){
		echo 0;
	}
	
	$pass_md5 = md5($pass);
	$sql = "UPDATE usuarios SET password = '$pass_md5' WHERE uid = '$uid'";
	$res = $conexion->query($sql);
	$num = $conexion->affected_rows;

	if($num==1){
		$sql_user = "SELECT nombre, primer_apellido, email FROM usuarios WHERE uid = '$uid'";
		$res_user = $conexion->query($sql_user);
		$row_user = $res_user->fetch_array(MYSQLI_ASSOC);
		
		$name = $row_user['nombre'];
		$pa = $row_user['primer_apellido'];
		$email = $row_user['email'];
		$fecha = date("F d, Y");
		
		$titulo = "Contraseña actualizada";	
		$mensaje = "Estimado/a $name $pa, le comunicamos que la contraseña de su cuenta en el Sistema Viajes Transparentes ha sido modificado con éxito. <br /><br />
			Tus nuevos datos de acceso son:<br /><br />
			Usuario:$email<br />
			Contraseña:$pass<br />
			Para acceder a tu cuenta da clic al siguiente enlace: http://www.didei.mx/ifai<br /><br />
			El Equipo de DIDEI.MX<br />
			contacto@didei.mx<br />
			Fecha:$fecha";
			
		include('mandar_correo.php');
		echo 1;
	}else{
		echo 0;
	}
?>