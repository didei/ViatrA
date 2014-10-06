<?php
	include_once("../include/conexion.php");
	$conexion = Conectar("dideimx_ifai");

	$buscar = clear_string($conexion,$_GET['criterio']);

	  		$sql = "SELECT uid, nombre, primer_apellido, segundo_apellido, rol FROM usuarios WHERE nombre LIKE '_".$buscar."%' || nombre LIKE '".$buscar."%' AND rol=1 order by nombre";
				$res = $conexion->query($sql);
				while($row = $res->fetch_assoc()){
					$nombre2=trim($row['nombre']);
					$usuarios = $nombre2." ".$row['primer_apellido']." ".$row['segundo_apellido'];
        			$url = "javascript:reemplazar_criterio('".$usuarios."','".$row['uid']."')";
        			echo '<a href="'.$url.'">'.$usuarios.'</a>';
				}		
	$conexion->close();			
?>