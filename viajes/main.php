<?php
	if($rol==2){ /* Usuarios */
		switch($id){
			case 1: include_once("./principal.php");
				break;
			case 2: include_once("./perfil.php"); 
				break;
			case 5: include_once("./detalle_comision.php"); 
				break;
			case 1000: include_once("./logout.php");
				break;
			default: include_once("./principal.php");
				break;
		}
	}
	if($rol==1){ /* Servidores */
		switch($id){
			case 1: include_once("./perfil.php"); 
				break;
			case 3: include_once("./form_comision.php");
				break;
			case 4: include_once("./update_comision.php");
				break;
			case 5: include_once("./detalle_comision.php"); 
				break;
			case 1000: include_once("./logout.php");
				break;
			default: include_once("./perfil.php");
				break;
		}
	}
	if($rol==0){/* Administrador*/
		switch ($id) {
			case 2 : include_once("./faddservidor.php");
				break;
			case 3: include_once("./allcomisiones.php");
				break;
			case 1000: include_once("./logout.php");
				break;	
			default : include_once("./homeadm.php");
			    break;
		}
	}
?>