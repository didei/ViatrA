<?php
	$ruta ="../imgs/servidores/";
	$nombre =$_POST['uid'];
	$extencion = $nombre.$_FILES['foto']['name'];
	@$tipo = end(explode(".", $extencion));  
	$nom=$nombre.".".$tipo;
	$file=$ruta.$nom;
	if (move_uploaded_file($_FILES['foto']['tmp_name'], $file)) {
    		echo("<script type='text/javascript'>alert('La foto se cargo de forma exitosa') </script>");
    		include '../include/conexion.php';
			$conexion = Conectar("dideimx_ifai");
			$conexion->query("UPDATE servidores SET img ='$nom' WHERE uid= '$nombre'");
			echo("<script type='text/javascript'>document.location='index.php?id=1' </script>");
	} 
?>