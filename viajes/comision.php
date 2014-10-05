<?php
	include '../include/conexion.php';
	$conexion = Conectar("dideimx_ifai");

	$UID                = clear_string($conexion,$_POST['UID']);  
	$CONSECUTIVO		= clear_string($conexion,$_POST['CONSECUTIVO']);
	$MEC_ORIGEN 		= clear_string($conexion,$_POST['MEC_ORIGEN']);
	$INST_GENERA		= clear_string($conexion,$_POST['INST_GENERA']);
	$UR					= clear_string($conexion,$_POST['UR']);
	$TIPO_REP			= clear_string($conexion,$_POST['TIPO_REP']);
	$TEMA				= clear_string($conexion,$_POST['TEMA']); 
	$TIPO_COM			= clear_string($conexion,$_POST['TIPO_COM']);
	$EVENTO				= clear_string($conexion,$_POST['EVENTO']); 
	$URL_EVENTO			= clear_string($conexion,$_POST['URL_EVENTO']);
	$FECHAINICIO_COM	= date('Y-m-d',strtotime(clear_string($conexion,$_POST['FECHAINICIO_COM'])));
	$FECHAFIN_COM		= date('Y-m-d',strtotime(clear_string($conexion,$_POST['FECHAFIN_COM'])));

	$TIPO_VIAJE			= clear_string($conexion,$_POST['TIPO_VIAJE']);
	$ACUERDO 			= clear_string($conexion,$_POST['ACUERDO']);
	$OFICIO 			= clear_string($conexion,$_POST['OFICIO']);
	$CUBRE_PASAJE 		= clear_string($conexion,$_POST['CUBRE_PASAJE']);
	$TIPO_PASAJE 		= clear_string($conexion,$_POST['TIPO_PASAJE']);
	$GASTO_PASAJE 		= clear_string($conexion,$_POST['GASTO_PASAJE']);
	if($TIPO_PASAJE = "Aereo"){
		$LINEA_ORIGEN 		= clear_string($conexion,$_POST['LINEA_ORIGEN']);
		$VUELO_ORIGEN 		= clear_string($conexion,$_POST['VUELO_ORIGEN']);
		$LINEA_REGRESO 		= clear_string($conexion,$_POST['LINEA_REGRESO']);
		$VUELO_REGRESO 		= clear_string($conexion,$_POST['VUELO_REGRESO']);
	}
	$PAIS_ORIGEN 		= clear_string($conexion,$_POST['PAIS_ORIGEN']);
	$ESTADO_ORIGEN 		= clear_string($conexion,$_POST['ESTADO_ORIGEN']);
	$CIUDAD_ORIGEN 		= clear_string($conexion,$_POST['CIUDAD_ORIGEN']);
	$PAIS_DESTINO 		= clear_string($conexion,$_POST['PAIS_DESTINO']);
	$ESTADO_DESTINO 	= clear_string($conexion,$_POST['ESTADO_DESTINO']);
	$CIUDAD_DESTINO     = clear_string($conexion,$_POST['CIUDAD_DESTINO']);

	
	$Query_comision = "INSERT INTO comisiones (
    	ID_SERVIDOR, CONSECUTIVO, MEC_ORIGEN, INST_GENERA, UR, TIPO_REP, TEMA, TIPO_COM, EVENTO, URL_EVENTO, FECHAINICIO_COM, FECHAFIN_COM, estatus )
	VALUES 
		('$UID', '$CONSECUTIVO', '$MEC_ORIGEN', '$INST_GENERA', '$UR', '$TIPO_REP', '$TEMA', '$TIPO_COM', '$EVENTO', '$URL_EVENTO', '$FECHAINICIO_COM', '$FECHAFIN_COM', '1')
	";
	$res = $conexion->query($Query_comision);
	$ID_COMISION = $conexion->insert_id;

	$Query_traslado = "INSERT INTO traslado (
		ID_COMISION, TIPO_VIAJE, ACUERDO, OFICIO, CUBRE_PASAJE, TIPO_PASAJE, GASTO_PASAJE, LINEA_ORIGEN, VUELO_ORIGEN, LINEA_REGRESO, VUELO_REGRESO, PAIS_ORIGEN, ESTADO_ORIGEN, CIUDAD_ORIGEN, PAIS_DESTINO, ESTADO_DESTINO, CIUDAD_DESTINO)
	VALUES 
		('$ID_COMISION', '$TIPO_VIAJE', '$ACUERDO', '$OFICIO', '$CUBRE_PASAJE', '$TIPO_PASAJE', '$GASTO_PASAJE', '$LINEA_ORIGEN', '$VUELO_ORIGEN', '$LINEA_REGRESO', '$VUELO_REGRESO', '$PAIS_ORIGEN', '$ESTADO_ORIGEN', '$CIUDAD_ORIGEN', '$PAIS_DESTINO', '$ESTADO_DESTINO', '$CIUDAD_DESTINO')
	";	
	
	$res2 = $conexion->query($Query_traslado);
	if($res && $res2){
		$respuesta = '1';
	}else{
		$respuesta = '2';
	}

	/*if( 
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
		$respuesta = '2';	
		
	}else{
		if('TIPO_PASAJE' == 'Aereo'){
			if(
				$LINEA_ORIGEN 	== "" ||
				$VUELO_ORIGEN 	== "" ||
				$LINEA_REGRESO	== "" ||
				$VUELO_REGRESO  == ""){
				$respuesta = '3';
			}else{
				$conexion->query($Query_comision);

				
			}
		}else{
			if($conexion->query($Query_comision) && $conexion->query($Query_traslado)){
				$respuesta = '1';
			}
		}
		
	} 

	
	$respuesta = $result;*/
	$conexion->close();
	echo "$respuesta";
		 
?>