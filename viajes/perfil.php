<?php
  if ($_SESSION['rol'] == ""){
      header( "Status: 301 Moved Permanently", false, 301);
      header("Location: ../");
      exit();
  }else{?>
    <div class="row">
      <div class="col-md-6 col-lg-6" id="perfil">
      	<div class="panel panel-default">
    			<?php
            if($_SESSION['rol'] == 1){
              $uid = $_SESSION['uid'];
            }
            else{
              $uid = clear_string($conexion, $_GET['se']); 
            }
    			  $query = "SELECT u.uid, u.nombre, u.primer_apellido, u.segundo_apellido, u.email, s.img, s.cargo, s.unidad_administrativa
                      FROM usuarios as u, servidores as s
                      WHERE u.uid = '$uid' && s.uid = u.uid";
            $Resultado = $conexion->query($query);
            $Filas = $Resultado->fetch_array();
          ?>
      		<div class="panel-heading">
        		<h3 class="panel-title"><?php echo $Filas['nombre']." ".$Filas['primer_apellido']." ".$Filas['segundo_apellido'];?></h3>
      		</div>
      		<div class="panel-body row">
            <div class="col-xs-4 col-sm-2 col-md-4">           
      			  <img src="../imgs/servidores/<?php echo $Filas['img'];?>" class="img-responsive img-circle" alt="">
            </div> 
            <div class="col-xs-8 col-sm-10 col-md-8">
              <dl class="dl-horizontal">
                <dt>Email</dt>	
                <dd><?php echo $Filas['email'] ?></dd>
                <dt>Cargo</dt>	
                <dd><?php echo $Filas['cargo'] ?></dd>
                <dt>Unidad Administrativa</dt>
                <dd><?php echo $Filas['unidad_administrativa'] ?></dd>
              </dl>
            </div>  
          </div>
      	</div>
      </div>
      <div class="col-md-6 col-lg-6">
      	<div class="panel panel-success">
        		<div class="panel-heading">
          		<h3 class="panel-title">Última comisión:</h3>
        		</div>
        		<div class="panel-body row">
            <?php
              $query = "SELECT c.id_comision, c.mec_origen, c.inst_genera, c.ur, c.tema, c.tipo_com, c.evento, c.url_evento, c.fechainicio_com, c.fechafin_com,
                               t.ciudad_origen, t.estado_origen, t.estado_destino, t.ciudad_destino, t.tipo_pasaje, t.tipo_viaje
                        FROM comisiones as c, traslado as t
                        WHERE c.id_servidor = $uid && c.id_comision = t.id_comision && c.estatus = 1";
              $Resultado = $conexion->query($query);
              $Filas = $Resultado->fetch_array();
              if($Resultado->num_rows!=0){?>  
             		<div class="col-xs-12">
                  <h4>Evento</h4>
                  <div class="lista_comision"> <?php echo $Filas['evento'] ?> </div>
                </div>
                <div class="col-xs-12">
                  <dl class="dl-horizontal">
                    <dt>Tema</dt>
                    <dd><?php echo $Filas['tema'] ?></dd>
                    <dt>Tipo de comisión</dt>
                    <dd><?php echo $Filas['tipo_com'] ?></dd>
                    <dt>Mecanismo de Origen</dt>
                    <dd><?php echo $Filas['mec_origen'] ?></dd>
                    <dt>Quién invita</dt>
                    <dd><?php echo $Filas['inst_genera'] ?></dd>
                    <dt>Unidad Responsable</dt>
                    <dd><?php echo $Filas['ur'] ?></dd>
                    <dt>URL del evento</dt>
                    <dd><?php echo $Filas['url_evento'] ?></dd>
                  </dl>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <dl class="dl-horizontal">
                    <dt>Fecha de inicio</dt>
                    <dd><?php echo $Filas['fechainicio_com'] ?></dd>
                  </dl>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <dl class="dl-horizontal">
                    <dt>Fecha de término</dt>
                    <dd><?php echo $Filas['fechainicio_com'] ?></dd>
                  </dl>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <dl class="dl-horizontal">
                    <dt>Tipo de viaje</dt>
                    <dd><?php echo $Filas['tipo_viaje'] ?></dd>
                  </dl>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <dl class="dl-horizontal">
                    <dt>Tipo de pasaje</dt>
                    <dd><?php echo $Filas['tipo_pasaje'] ?></dd>
                  </dl>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <dl class="dl-horizontal">
                    <dt>Ciudad de origen</dt>
                    <dd><?php echo $Filas['ciudad_origen'] ?></dd>
                    <dt>Estado de origen</dt>
                    <dd><?php echo $Filas['estado_origen'] ?></dd>
                  </dl>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <dl class="dl-horizontal">
                    <dt>Ciudad de destino</dt>
                    <dd><?php echo $Filas['ciudad_destino'] ?></dd>
                    <dt>Estado de destino</dt>
                    <dd><?php echo $Filas['estado_destino'] ?></dd>
                  </dl>
                </div>
                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                <?php
                if($_SESSION['rol'] == 1){?>
                  <div class="col-xs-12 col-sm-5 ">
                    <button onclick="location.href='?id=4&co=<?php echo $Filas['id_comision']?>'" type='button' class='btn btn-primary btn-md btn-block'>Editar comisión</button>
                  </div>
                  <div class="clearfix hidden-lg hidden-sm hidden-md"></div><br class='hidden-lg hidden-sm hidden-md'>
                  <div class="col-xs-12 col-sm-5 col-sm-offset-2">
                    <button id='Cerrar' type='button' class='btn btn-primary btn-md btn-block'>Finalizar comisión</button>
                  </div>
                <?php
                }
              }else{ ?>
                <div class="col-sm-12 col-xs-12 text-center">
                	<strong><em>Sin comisión actual</em></strong>
                  <?php
                    if($_SESSION['rol'] == 1){
                      echo "<button onclick=\"location.href='?id=3'\" type='button' class='btn btn-primary btn-md btn-block'>Nueva comisión</button>";
                    }?> 
                </div>            
              <?php 
              } ?>
        		</div>
      	</div>
      </div>
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" id="seguidos">
      	<div class="panel panel-info">
        		<div class="panel-heading">
          		<h3 class="panel-title">Comisiones Anteriores:</h3>
        		</div>
        		<div class="panel-body row">
              <?php
    					  $sql = "SELECT id_comision, evento FROM comisiones WHERE id_servidor = '$uid' && estatus = '2' ORDER BY id_comision DESC LIMIT 6 ";
    					  $res = $conexion->query($sql);
                if($res->num_rows!=0){
                  $res = $conexion->query($sql);
                  $cont = 1;
      					  while($row = $res->fetch_array()){
      						$evento = $row['evento'];
  							  $co = $row['id_comision'];
      						  echo "<div class=' col-md-4 col-lg-4 col-sm-6 col-xs-12'>";
      							echo   "<a href='?id=5&co=".$co."'>".$evento."</a>";
                    echo "</div>";
                    if($cont == 1)
                      $cont++;
                    else
                      echo "<div class='clearfix hidden-xs hidden-md hidden-lg'></div>";
                    $cont = 1;  
      					  }
                }else{?>
                  <div class="col-sm-12 col-xs-12 text-center">
                    <strong><em>No existen comisiones anteriores</em></strong>
                    <?php
                      if($_SESSION['rol'] == 1){
                        echo "<button onclick=\"location.href='?id=3'\" type='button' class='btn btn-primary btn-md btn-block'>Nueva comisión</button>";
                      }?> 
                  </div>  
                <?php }
    				  ?>
        		</div>
      	</div>
      </div>
    </div>
    
    <div class="modal fade" id="Finalizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Finalizar comisión</h4>
          </div>
          <div class="modal-body text-justify">
            Estas a punto de finalizar la comisión, si ya actualizaste todos los datos (traslado, viaticos, reportes) 
            y estas seguro de querer finalizar presiona "Aceptar" de lo contrario presiona "Cancelar". 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" id='Aceptar' class="btn btn-primary">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="Finalizado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            Comisión finalizada
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
    <script>
	
	$(document).ready(function(){
		
		$('#Finalizado').modal('hide');
		
		$('#Cerrar').click(function(){
			$('#Finalizar').modal('toggle');
		});
		
		$('#Aceptar').click(function(){
			$('#Finalizar').modal('toggle');
			var comision = <?php echo $Filas['id_comision']?>;
			var parametros = {
				Concluir : true,
				Comision  : comision
			}
			$.ajax({
				url : "./update.php",
				type: 'post',
				dataType: 'text',
				data: parametros,
				success: function(res){
					if(res==1){
						$('#Finalizado').modal('show');
						$('#Finalizado').on('hide.bs.modal',function(){
							window.location.href=window.location.href;
						});
					}else{
						alert(res)
					}
				}
			});
		});
	});
	
	
    </script>
    <?php 
  }
 ?>
