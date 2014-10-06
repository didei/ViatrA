<div class="row">
	<?php 
		$sql = "SELECT id_servidor FROM seguimientos WHERE id_usuario = '$uid'";
		$res = $conexion->query($sql);
		$num = $res->num_rows;
		$res->close();
		if($num > 0){
	?>
            <div class="col-md-6 col-lg-6" id="seguidos">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Servidores públicos que sigues:</h3>
                    </div>
                    <div class="panel-body row">
                    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
							<?php
                            $num_carrusel = ($num / 3) ;
                            for($i = 0; $i < $num_carrusel; $i++){?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){echo ' active';}?>"></li>
                            <?php }?> 
                          </ol>
                        
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner">
                          <?php
						  	$n = 0;
                            for($i = 0; $i < $num_carrusel; $i++){?>
                            <div class="item<?php if($i == 0){echo ' active';}?>">
                              <?php
							  		$sql = "SELECT id_servidor FROM seguimientos WHERE id_usuario = '$uid' LIMIT $n, 3";
									$res = $conexion->query($sql);
									while($row = $res->fetch_array()){
										$id_s = $row['id_servidor'];
										$sql2 = "SELECT nombre, primer_apellido, img FROM usuarios AS us, servidores AS ser WHERE  us.uid = '$id_s' AND ser.uid = '$id_s'";
										$res2 = $conexion->query($sql2);
										$row2 = $res2->fetch_array();
										$nombre = $row2['nombre'];
										$pa = $row2['primer_apellido'];
										$img = $row2['img'];
							  ?>
										<div class=" col-md-4 col-lg-4 col-sm-4 col-xs-4 text-center">
											<a href="?id=2&se=<?php echo $id_s;?>"><img src="../imgs/servidores/<?php echo $img; ?>" class="img-responsive img-circle center-block" alt="">
											<?php echo $nombre." ".$pa;?></a>
										</div> 
							  <?php } 
							$n += 3; ?>
                              
                            </div>
                          <?php }?> 
                          </div>
                         
                          <!-- Controls -->
                          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                          </a>
                          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Notificaciones:</h3>
                    </div>
                    <div class="panel-body row">
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                            16 de Septiembre de 2014
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                            Compartir en: 
                        </div>
                    </div>
                </div>
            </div>
    <?php }else{ ?>
    	  	 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 margen_ar_40px" id="bienvenidos">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Bienvenido/a</h3>
                    </div>
                    <div class="panel-body row">
                    	<div class   ="form-group col-xs-12" id='UR-div'>
                    		<p>Viajes Transparentes es un sistema que nos ayuda a transparentar inteligentemente la información pública que se genera sobre los viajes de trabajo nacionales e internacionales de los comisionados y los servidores públicos del IFAI para fomentar un debate público informado y rendir cuentas en la materia.</p>

							<p><span class="texto_verde">Por ahora no sigues a ningún servidor público del ifai</span>, a continuación te mostramos algunas recomendaciones para navegar en el sistema:</p>

                            <p>+ En el bloque de <strong>Notificaciones recientes</strong> aparecen los 6 servidores públicos que actualmente se ecuentran <strong>ACTIVOS</strong> en alguna comisión.</p>
                            
                            <p>+ Para seguir algún servidor del ifai, únicamente dá clic en la cinta <strong>Seguir</strong> y ¡LISTO!</p>
                            
                            <p>+ En caso de que quisieras seguir a algún servidor público en especial, en la parte superior derecha se encuentra el buscador, donde ingresando nombre, apellidos o ambos puedes encontrar al servidor en caso de que éste se encuentre registrado en el sistema.</p>
                            
                            <p>+ Al dar clic en la imagen o nombre del servidor nos muestra su perfil, así como su información de la última comisión y sus comisiones anteriores en caso de tenerlas.</p>
                            
                            
                            <p class="text-right">Cualquier problema, por favor comuníquese al <strong>correo contacto@didei.mx</strong></p>
                        </div>
                    </div>
                </div>
             </div> 
    <?php } ?>
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" id="seguidos">
    	<div class="panel panel-info">
      		<div class="panel-heading">
        		<h3 class="panel-title">Notificaciones recientes:</h3>
      		</div>
      		<div class="panel-body row">
            	<?php
					$sql = "SELECT id_servidor, id_comision, nombre, primer_apellido, s.img FROM servidores AS s, ( SELECT * FROM comisiones WHERE estatus = 1 ORDER BY id_comision DESC)subtabla
							JOIN usuarios ON id_servidor = uid
								GROUP BY id_servidor 
								ORDER BY id_comision DESC LIMIT 6 ";
					$res = $conexion->query($sql) ;
					while($row = $res->fetch_array()){
						$id_s = $row['id_servidor'];
						$co = $row['id_comision'];
						$nombre = $row['nombre'];
						$pa = $row['primer_apellido'];
						$img = $row['img'];
				?>
						<div class=" col-md-4 col-lg-4 col-sm-6 col-xs-6 text-center margen_ab_30px">
                            <a href="?id=2&se=<?php echo $id_s;?>">
                            	<img src="../imgs/servidores/<?php echo $img; ?>" class="img-responsive img-circle center-block" alt="">
                            </a>
                            <div class="nombre-serv-seg"><a href="?id=2&se=<?php echo $id_s;?>"><?php echo $nombre." ".$pa;?></a></div>
                            <div class="seg" onclick="seguir(<?php echo $id_s; ?>,<?php echo $uid; ?>);">
                                <img src="../imgs/liston.png" alt="" class="img-liston center-block">
                                <div class="seguir center-block">
                                	<?php
                                	$sql_seg = "SELECT id_seguimiento FROM seguimientos WHERE id_servidor = '$id_s' AND id_usuario = '$uid'";
									$res_seg = $conexion->query($sql_seg);
									if($res_seg->num_rows==0){
										echo "Follow";
									}else{
										echo "Unfollow";
									}
									?>
                                </div> 
                            </div>
                        </div>
				<?php	
					}
				?>
      		</div>
    	</div>
    </div>
</div>