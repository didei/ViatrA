<?php
	include_once 'psl-config.php'; 
	
	function Conectar(){
		
		$conexion = new mysqli(HOST, USER, PASSWORD, DATABASE);
		
		if ($conexion->connect_errno) {
			printf("Connect failed: %s\n", $conexion->connect_error);
			exit();
		}
		
 		mysqli_set_charset($conexion,FORMAT);
		return $conexion;
	}
	
	function clear_string($conexion, $cadena){
		if($conexion instanceof Mysqli){
			$cadena = $conexion->real_escape_string($cadena);
			$cadena = strip_tags($cadena);
		}
		return $cadena;
	}
	
	function decrypt($data){
		$decode = base64_decode(base64_decode($data));
		return $decode;
		/*return mcrypt_decrypt(
			MCRYPT_RIJNDAEL_128,
			KEY,
			$decode,
			MCRYPT_MODE_CBC,
			"\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
		);*/
	}
	
	function encrypt($data){
		return base64_encode(base64_encode($data));
			/*mcrypt_encrypt(
				MCRYPT_RIJNDAEL_128,
				KEY,
				$data,
				MCRYPT_MODE_CBC,
				"\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
			)
		);*/
	}
?>