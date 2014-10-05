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
						<div class=" col-md-4 col-lg-4 col-sm-6 col-xs-6 text-center margen_ab_20px">
                                <a href="?id=2&se=<?php echo $id_s;?>"><img src="../imgs/servidores/<?php echo $img; ?>" class="img-responsive img-circle center-block" alt="">
                                <?php echo $nombre." ".$pa;?></a>
                        </div>
				<?php	
					}
				?>
      		</div>
    	</div>
    </div>
</div>