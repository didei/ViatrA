<?php 
	require('../PHPMailer_5.2.4/class.phpmailer.php');
		
	$mail = new PHPMailer();
	
	//Luego tenemos que iniciar la validación por SMTP:
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->CharSet = "UTF-8";
	$mail->Host = "webmail.didei.mx"; // SMTP a utilizar. Por ej. smtp.elserver.com
	$mail->Username = "contacto@didei.mx"; // Correo completo a utilizar
	$mail->Password = "D1d3i2014"; // Contraseña
	//$mail->Port = 25; // Puerto a utilizar
	//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
	$mail->From = "contacto@didei.mx"; // Desde donde enviamos (Para mostrar)
	$mail->FromName = "Viajes Ifai";
	//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
	$mail->AddAddress($email,$name." ".$pa); // Esta es la dirección a donde enviamos
	$mail->IsHTML(true); // El correo se envía como HTML
	$mail->Subject = $titulo; // Este es el titulo del email.
	$mail->Body = $mensaje; // Mensaje a enviar
	$exito = $mail->Send(); // Envía el correo.
	//También podríamos agregar simples verificaciones para saber si se envió:
	if($exito){
		$num = 2;
	}else{
		$num = 3;
	}

?>