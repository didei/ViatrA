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

		$FECHAINICIO_PAR    = clear_string($conexion,$_POST['FECHAINICIO_PAR']);
		$FECHAFIN_PAR     	= clear_string($conexion,$_POST['FECHAFIN_PAR']);
		$MOTIVO     		= clear_string($conexion,$_POST['MOTIVO']);
		$ANTECEDENTE     	= clear_string($conexion,$_POST['ANTECEDENTE']);
		$ACTIVIDAD     		= clear_string($conexion,$_POST['ACTIVIDAD']);
		$RESULTADOS     	= clear_string($conexion,$_POST['RESULTADOS']);
		$URL_COMUNICADO     = clear_string($conexion,$_POST['URL_COMUNICADO']);

		$GASTOS    		 	= clear_string($conexion,$_POST['GASTOS']);
		$TARIFA_DIARIA     	= clear_string($conexion,$_POST['TARIFA_DIARIA']);
		$MONEDA     		= clear_string($conexion,$_POST['MONEDA']);
		$GASTOS_COMPROBADOS = clear_string($conexion,$_POST['GASTOS_COMPROBADOS']);
		$GASTOS_S_COMPROBAR = clear_string($conexion,$_POST['GASTOS_S_COMPROBAR']);
		$VIATICOS_DEVUELTOS = clear_string($conexion,$_POST['VIATICOS_DEVUELTOS']);
		$FECHAINICIO_HOTEL  = clear_string($conexion,$_POST['FECHAINICIO_HOTEL']);
		$FECHAFIN_HOTEL     = clear_string($conexion,$_POST['FECHAFIN_HOTEL']);
		$CUBRE_HOSPEDAJE    = clear_string($conexion,$_POST['CUBRE_HOSPEDAJE']);
		$HOTEL     			= clear_string($conexion,$_POST['HOTEL']);
		$COSTO_HOTEL     	= clear_string($conexion,$_POST['COSTO_HOTEL']);
		$CIUDAD_DESTINO     = clear_string($conexion,$_POST['CIUDAD_DESTINO']);
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

		$Query_informa	= "UPDATE informes SET	
			FECHAINICIO_PART       	= '$FECHAINICIO_PAR',
            FECHAFIN_PART          	= '$FECHAFIN_PAR',
            MOTIVO                  = '$MOTIVO',
            ANTECEDENTE             = '$ANTECEDENTE',
            ACTIVIDAD               = '$ACTIVIDAD',
            RESULTADO	            = '$RESULTADOS',
            URL_COMUNICADO          = '$URL_COMUNICADO'
            WHERE id_comision = '$ID_COMISION'";
        
        $Query_viaticos	= "UPDATE viaticos SET    
	        GASTO_VIATICO      	=  '$GASTOS',
	        TARIFA_DIARIA       =  '$TARIFA_DIARIA',
	        MONEDA              =  '$MONEDA',
	        COMPROBADO  		=  '$GASTOS_COMPROBADOS',
	       	SIN_COMPROBAR  		=  '$GASTOS_S_COMPROBAR',
	       	VIATICO_DEVUELTO	=  '$VIATICOS_DEVUELTOS',
	        FECHAINICIO_HOTEL   =  '$FECHAINICIO_HOTEL',
	        FECHAFIN_HOTEL      =  '$FECHAFIN_HOTEL',
	        INST_HOSPEDAJE     	=  '$CUBRE_HOSPEDAJE',
	       	HOTEL               =  '$HOTEL',
	        COSTO_HOTEL         =  '$COSTO_HOTEL'
	        WHERE id_comision = '$ID_COMISION'";

	    $Fecha_act = date('Y-m-d');
	    $Query_actualizacion = "INSERT INTO actualizaciones (id_comision, tabla, fecha) VALUES ('$ID_COMISION', 'comisiones', '$Fecha_act')";
	
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
			$respuesta = "error 1";	
			
		}else{
			if('TIPO_PASAJE' == 'Aereo'){
				if(
					$LINEA_ORIGEN 	== "" ||
					$VUELO_ORIGEN 	== "" ||
					$LINEA_REGRESO	== "" ||
					$VUELO_REGRESO  == ""){
					$respuesta = '3';
				}else{
					if( $conexion->query($Query_actualizacion)  &&
						$conexion->query($Query_comision)  		&& 
						$conexion->query($Query_traslado)  		&&
						$conexion->query($Query_informa)   		&&
						$conexion->query($Query_viaticos)){
						$respuesta = '1';
					}
					else{
						$respuesta = '4';
					}
				}
			}else{
				if( $conexion->query($Query_actualizacion)  &&
					$conexion->query($Query_comision)  		&& 
					$conexion->query($Query_traslado)  		&&
					$conexion->query($Query_informa)   		&&
					$conexion->query($Query_viaticos)){
					$respuesta = '1';
				}else{
					$respuesta = '5';
				}
			}
			
		}
	}
	
	$conexion->close();
	echo "$respuesta";
		 
?>