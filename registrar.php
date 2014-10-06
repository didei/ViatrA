<?php
	include_once("./include/conexion.php");
	$conexion = Conectar("dideimx_ifai");
	
	$name = clear_string($conexion,$_POST['name']);
	$pa = clear_string($conexion,$_POST['pa']);
	$sa = clear_string($conexion,$_POST['sa']);
	$email = clear_string($conexion,$_POST['email']);
	
	if($name != '' || $pa != '' || $sa != '' || $email != ''){
		
		$sql2 = "SELECT email FROM usuarios WHERE email = '$email'";
		$res2 = $conexion->query($sql2);
		$num2 = $res2->num_rows;
		$res2->close();
		if($num2 == 0){
			function NuevoPassword($longitud=8,$fuerza=4)
			  {
				$vocales = 'aeiouy';
				$consonantes = 'bcdfghjklmnpqrstvwxz';
				if ($fuerza & 1){
					$consonantes .= 'BDGHJLMNPQRSTVWXZ';
				}
				if ($fuerza & 2){
					$vocales .= "AEIOUY";
				}
				if ($fuerza & 4){
					$consonantes .= '23456789AEIOUY';
				}
				$password = '';
				$alt = time() % 2;
				for ($i = 0; $i < $longitud; $i++){
					if ($alt == 1){
						$password .= $consonantes[(rand() % strlen($consonantes))];
						$alt = 0;
					}
					else{
						$password .= $vocales[(rand() % strlen($vocales))];
						$alt = 1;
					}
				}
				return $password;
    		}
			
			$pass_md5 =	md5($password = NuevoPassword());
			$date = date("Y-m-d");
			
			$sql = "INSERT INTO usuarios 
						(nombre, primer_apellido, segundo_apellido, password, email, rol, fecha_alta) 
						VALUE
						('$name', '$pa', '$sa', '$pass_md5', '$email', 2, '$date')";
			if($res = $conexion->query($sql)){
				if($conexion->affected_rows){
					$num = 1;
					$fecha = date("F d, Y");
					$hora = date("h:i a");
					$titulo = "Bienvenido a Viajes Transparentes";	
					$mensaje = "Bienvenido/a $name $pa<br /><br />
						Hemos recibido tu solicitud para registrarte en el Sistema Viajes Transparentes.<br /><br />
						Tus datos de acceso son:<br /><br />
						Usuario:$email<br />
						Contraseña:$password<br /><br />
						Para acceder a tu cuenta da clic al siguiente enlace: http://www.didei.mx/ifai <br /><br />
						El Equipo de DIDEI. MX<br />
						contacto@didei.mx<br />
						Fecha:$fecha";				
					//$mensaje = "Buen día ".$name." ".$pa."! Su contraseña para que pueda ingresar en la aplicación de viajes transparentes será ésta: ";
					//$mensaje .= $password;
					include('mandar_correo.php');
				}
			}
		}	
	}
	
	if($num==1){
		echo 1;
	}elseif($num==2){
		echo 2;
	}elseif($num==3){
		echo 3;
	}else{
		echo 0;
	}
	
	$conexion->close();
?>