<?php
	include_once("./include/conexion.php");
	$conexion = Conectar();
	
	$email = clear_string($conexion,$_POST['email']);
	
	if($email == ''){
		echo  0;
		exit;
	}
		
	$sql = "SELECT uid, nombre, primer_apellido FROM usuarios WHERE email = '$email'";
	$res = $conexion->query($sql);
	$num = $res->num_rows;
	
	if($num == 1){
		$row = $res->fetch_assoc();
		$uid = $row['uid'];
		
		/* Genera el codigo de recuperacion */
		$fecha = date("d-m-Y G:i:s");		
		
		$fecha_enc = urlencode(encrypt($fecha));
		$uid_enc = urlencode(encrypt($uid));
		
		/* Manda mensaje al usuario */
		$name = $row['nombre'];
		$pa = $row['primer_apellido'];
		$titulo = "Solicitud de cambio de contraseña";
		
		$mensaje = "Estimado/a $name $pa, hemos recibido una solicitud para cambiar la contraseña para tu cuenta en el Sistema Viajes Transparentes.<br /><br />
			Si tu has realizado esta solicitud, y quisieras cambiar tu contraseña, por favor haz clic en el enlace que se muestra a continuación:<br /><br />
			http://didei.mx/tester/ifai/rec.php?f=$fecha_enc&i=$uid_enc <br /><br />
			Nota: Este enlace será válido únicamente durante un lapso no mayor a 6 hrs.<br /><br />
			En caso de no haber solicitado el cambio de tu contraseña, probablemente otro usuario ha remitido la solicitud por error. En ese caso, puedes ignorar este mensaje y no se realizaran cambios en tu cuenta.<br /><br />
			Atentamente,<br /><br />
			Soporte técnico de Didei";
		//$mensaje = "link de recuperación: http://didei.mx/tester/ifai/rec.php?f=$fecha_enc&i=$uid_enc";
		include('mandar_correo.php');
		
		echo 1;
	}else{
		echo 0;
	}

	$res->close();
	$conexion->close();
?>