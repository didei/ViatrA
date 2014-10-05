<?php
    if ($_SESSION['uid'] == ""){
        header( "Status: 301 Moved Permanently", false, 301);
        header("Location: ../");
        exit();
    }else{
        $conexion = Conectar("dideimx_ifai");
        $ID_COMISION = clear_string($conexion,$_GET['co']);
        $Resultado   = $conexion->query("SELECT * FROM comisiones as c, traslado as t WHERE c.id_comision = '$ID_COMISION' && t.id_comision = '$ID_COMISION'");
        $Filas       = $Resultado->fetch_array();
        $Fecha1      = $Filas['fechainicio_com'];
        $Fecha2      = $Filas['fechafin_com'];
        ?>
        <div class ="row">
            <div class="col-xs-12 text-center">
                <h1>Comisión Anterior</h1>
            </div>
            <div class ="col-xs-12 col-sm-10 col-sm-offset-1">
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#comision">
                          Detalles de la comisión
                        </a>
                      </h4>
                    </div>
                    <div id="comision" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <div class   ="form-group col-xs-12 col-sm-6" id='CONSECUTIVO-div'>
                            <strong>Número de comisión: </strong>
                            <?php echo $Filas['consecutivo']; ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='MEC_ORIGEN-div'>
                            <strong>Mecanismo que origina la comisión: </strong>
                            	<?php echo $Filas['mec_origen']; ?>
                        </div>
                        <div class ="form-group col-xs-12 col-sm-6" id='INST_GENERA-div'>
                            <strong>Quién invita / qué UR solicita: </strong>
                            <?php echo $Filas['inst_genera']; ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='UR-div'>
                            <strong>Unidad Responsable: </strong>
                            <?php echo $Filas['ur'] ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='TIPO_REP-div'>
                            <strong>Tipo de representación requerida: </strong>
                            <?php echo $Filas['tipo_rep'] ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='TIPO_COM-div'>
                            <strong>Tipo de comisión: </strong>
                            <?php echo $Filas['tipo_com'] ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='TEMA-div'>
                            <strong>Tema: </strong>
                            <?php echo $Filas['tema'] ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='EVENTO-div'>
                            <strong>Nombre del evento o actividad principal a la que se asiste: </strong>
                            <?php echo $Filas['evento'] ?>
                        </div>
                        <div class   ="form-group col-xs-12" id='URL_EVENTO-div'>
                            <strong>URL del evento: </strong>
                            <?php echo $Filas['url_evento'] ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='FECHAINICIO_COM-div'>
                            <strong>Fecha de inicio de participación en el evento o actividad: </strong>
                            <div class="input-group">
                            	<?php echo $Fecha1 ?>
                            </div>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='FECHAFIN_COM-div'>
                            <strong>Fecha de fin de participación en el evento o actividad: </strong>
                            <div class="input-group">
                            	<?php echo $Fecha2 ?>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#coltraslado">
                          Detalles de traslado
                        </a>
                      </h4>
                    </div>
                    <div id="coltraslado" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <div class   ="form-group col-xs-12 col-sm-6" id='TIPO_VIAJE-div'>
                            <strong>Tipo de viaje: </strong>
                            <?php echo $Filas['tipo_viaje']; ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='ACUERDO-div'>
                            <strong>No. de acuerdo de autorización del pleno / de coordinadores: </strong>
                            <?php echo $Filas['acuerdo']; ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='OFICIO-div'>
                            <strong>No. de oficio de comisión: </strong>
                            <?php echo $Filas['oficio']; ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='CUBRE_PASAJE-div'>
                            <strong>Institución que cubre pasaje: </strong>
                            <?php echo $Filas['cubre_pasaje']; ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='TIPO_PASAJE-div'>
                            <strong>Tipo de pasaje: </strong>
                            <?php echo $Filas['tipo_pasaje']; ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6" id='GASTO_PASAJE-div'>
                           <strong>Gasto por concepto de pasaje en M.N: </strong>
                           <?php echo $Filas['gasto_pasaje']; ?>
                        </div>
                        <div id='Detalle_vuelo' class="collapse in col-xs-12">
                        <?php if( $Filas['tipo_pasaje'] == "Aéreo"){ ?>
                            <div class   ="form-group col-xs-12 col-sm-6" id='LINEA_ORIGEN-div'>
                                <strong>Aerolina(s) de vuelo(s) de ida: </strong>
                                <?php echo $Filas['linea_origen']; ?>
                            </div> 
                            <div class   ="form-group col-xs-12 col-sm-6" id='VUELO_ORIGEN-div'>
                                <strong>Numero(s) de vuelo de ida: </strong>
                                <?php echo $Filas['vuelo_origen']; ?>
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6" id='LINEA_REGRESO-div'>
                                <strong>Aerolina(s) de vuelo(s) de regreso: </strong>
                                <?php echo $Filas['linea_regreso']; ?>
                            </div> 
                            <div class   ="form-group col-xs-12 col-sm-6" id='VUELO_REGRESO-div'>
                                <strong>Numero(s) de vuelo de regreso: </strong>
                                <?php echo $Filas['vuelo_regreso']; ?>
                            </div>
                        <?php } ?>
                        </div>    
                        <div class   ="form-group col-xs-12 col-sm-6 col-md-4" id='PAIS_ORIGEN-div'>
                            <strong>Pais de origen: </strong>
                            <?php echo $Filas['pais_origen']; ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6 col-md-4" id='ESTADO_ORIGEN-div'>
                            <strong>Estado de origen*: </strong>
                            <?php echo $Filas['estado_origen']; ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6 col-md-4" id='CIUDAD_ORIGEN-div'>
                            <strong>Ciudad de origen: </strong>
                            <?php echo $Filas['ciudad_origen']; ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6 col-md-4" id='PAIS_DESTINO-div'>
                            <strong>Pais de destino: </strong>
                            <?php echo $Filas['pais_destino'] ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6 col-md-4" id='ESTADO_DESTINO-div'>
                            <strong>Estado de destino: </strong>
                            <?php echo $Filas['estado_destino']; ?>
                        </div>
                        <div class   ="form-group col-xs-12 col-sm-6 col-md-4" id='CIUDAD_DESTINO-div'>
                            <strong>Ciudad de destino: </strong>
                            <?php echo $Filas['ciudad_destino']; ?>
                        </div>     
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
<?php 
    }
 ?>
 