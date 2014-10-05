<?php
	include '../include/conexion.php';
	$conexion = Conectar("dideimx_ifai");
  
	if(clear_string($conexion,$_POST['Concluir'])){
		$Comision  = clear_string($conexion,$_POST['Comision']);
		$Query = "UPDATE comisiones SET estatus = '2' WHERE id_comision = '$Comision'";
		if($conexion->query($Query))
			$respuesta = 1;
		else
			$respuesta = "2";	
	}else{
		$ID_COMISION        = clear_string($conexion,$_POST['ID_COMISION']);  
		$CONSECUTIVO		= clear_string($conexion,$_POST['CONSECUTIVO']);
		$MEC_ORIGEN 		= clear_string($conexion,$_POST['MEC_ORIGEN']);
		$INST_GENERA		= clear_string($conexion,$_POST['INST_GENERA']);
		$UR					= clear_string($conexion,$_POST['UR']);
		$TIPO_REP			= clear_string($conexion,$_POST['TIPO_REP']);
		$TEMA				= clear_string($conexion,$_POST['TEMA']); 
		$TIPO_COM			= clear_string($conexion,$_POST['TIPO_COM']);
		$EVENTO				= clear_string($conexion,$_POST['EVENTO']); 
		$URL_EVENTO			= clear_string($conexion,$_POST['URL_EVENTO']);
		$FECHAINICIO_COM	= clear_string($conexion,$_POST['FECHAINICIO_COM']);
		$FECHAFIN_COM		= clear_string($conexion,$_POST['FECHAFIN_COM']);
	
		$TIPO_VIAJE			= clear_string($conexion,$_POST['TIPO_VIAJE']);
		$ACUERDO 			= clear_string($conexion,$_POST['ACUERDO']);
		$OFICIO 			= clear_string($conexion,$_POST['OFICIO']);
		$CUBRE_PASAJE 		= clear_string($conexion,$_POST['CUBRE_PASAJE']);
		$TIPO_PASAJE 		= clear_string($conexion,$_POST['TIPO_PASAJE']);
		$GASTO_PASAJE 		= clear_string($conexion,$_POST['GASTO_PASAJE']);
		$LINEA_ORIGEN 		= clear_string($conexion,$_POST['LINEA_ORIGEN']);
		$VUELO_ORIGEN 		= clear_string($conexion,$_POST['VUELO_ORIGEN']);
		$LINEA_REGRESO 		= clear_string($conexion,$_POST['LINEA_REGRESO']);
		$VUELO_REGRESO 		= clear_string($conexion,$_POST['VUELO_REGRESO']);
		$PAIS_ORIGEN 		= clear_string($conexion,$_POST['PAIS_ORIGEN']);
		$ESTADO_ORIGEN 		= clear_string($conexion,$_POST['ESTADO_ORIGEN']);
		$CIUDAD_ORIGEN 		= clear_string($conexion,$_POST['CIUDAD_ORIGEN']);
		$PAIS_DESTINO 		= clear_string($conexion,$_POST['PAIS_DESTINO']);
		$ESTADO_DESTINO 	= clear_string($conexion,$_POST['ESTADO_DESTINO']);
		$CIUDAD_DESTINO     = clear_string($conexion,$_POST['CIUDAD_DESTINO']);
	
		
		$Query_comision = "UPDATE comisiones SET 
			CONSECUTIVO		= '$CONSECUTIVO', 
			MEC_ORIGEN		= '$MEC_ORIGEN', 
			INST_GENERA		= '$INST_GENERA', 
			UR				= '$UR', 
			TIPO_REP		= '$TIPO_REP', 
			TEMA			= '$TEMA', 
			TIPO_COM		= '$TIPO_COM', 
			EVENTO			= '$EVENTO', 
			URL_EVENTO		= '$URL_EVENTO', 
			FECHAINICIO_COM	= '$FECHAINICIO_COM', 
			FECHAFIN_COM	= '$FECHAFIN_COM'
			WHERE id_comision = '$ID_COMISION'";
	
		$Query_traslado = "UPDATE traslado SET
			TIPO_VIAJE		= '$TIPO_VIAJE', 
			ACUERDO			= '$ACUERDO', 
			OFICIO			= '$OFICIO',
			CUBRE_PASAJE	= '$CUBRE_PASAJE', 
			TIPO_PASAJE		= '$TIPO_PASAJE', 
			GASTO_PASAJE	= '$GASTO_PASAJE',
			LINEA_ORIGEN	= '$LINEA_ORIGEN',
			VUELO_ORIGEN 	= '$VUELO_ORIGEN',
			LINEA_REGRESO	= '$LINEA_REGRESO',
			VUELO_REGRESO	= '$VUELO_REGRESO', 
			PAIS_ORIGEN		= '$PAIS_ORIGEN', 
			ESTADO_ORIGEN	= '$ESTADO_ORIGEN', 
			CIUDAD_ORIGEN	= '$CIUDAD_ORIGEN', 
			PAIS_DESTINO	= '$PAIS_DESTINO', 
			ESTADO_DESTINO	= '$ESTADO_DESTINO', 
			CIUDAD_DESTINO 	= '$CIUDAD_DESTINO'
			WHERE id_comision = '$ID_COMISION'";	
	
		if( 
			$CONSECUTIVO 		== "" ||
			$MEC_ORIGEN 		== "" || 
			$INST_GENERA 		== "" || 	
			$TIPO_REP 			== "" || 
			$TEMA 				== "" || 
			$TIPO_COM 			== "" || 
			$EVENTO 			== "" || 
			$FECHAINICIO_COM 	== "" || 
			$FECHAFIN_COM 		== "" ||
			$TIPO_VIAJE			== "" ||
			$TIPO_PASAJE		== "" ||
			$PAIS_ORIGEN		== "" ||
			$ESTADO_ORIGEN		== "" ||
			$CIUDAD_ORIGEN		== "" ||
			$PAIS_DESTINO		== "" ||
			$ESTADO_DESTINO		== "" ||
			$CIUDAD_DESTINO		== "")
		{
			$respuesta = $Comision;	
			
		}else{
			if('TIPO_PASAJE' == 'Aereo'){
				if(
					$LINEA_ORIGEN 	== "" ||
					$VUELO_ORIGEN 	== "" ||
					$LINEA_REGRESO	== "" ||
					$VUELO_REGRESO  == ""){
					$respuesta = '3';
				}else{
					if($conexion->query($Query_comision) && $conexion->query($Query_traslado)){
						$respuesta = '1';
					}
				}
			}else{
				if($conexion->query($Query_comision) && $conexion->query($Query_traslado)){
					$respuesta = '1';
				}
			}
			
		}
	}
	
	$conexion->close();
	echo "$respuesta";
		 
?>