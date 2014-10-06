<?php
	if ($_SESSION['rol'] == ""){
    	header( "Status: 301 Moved Permanently", false, 301);
      	header("Location: ../");
      	exit();
  	}
 	else{?>
 	<div class="row">
 		<div class="col-xs-12 text-center">
 			<h1> Comisiones </h1>
 		</div>
 		<div class="col-xs-12">
	 		<div class="panel panel-default">
	 			<div class="panel-heading">
	 				<h5> Listado de comisiones</h5>
	 			</div>
	 			<div class="panel-body">
	 				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
	 				</div>
	 				<div class=" col-xs-12 table-responsive">
	 					<?php
	 						@include './include/conexion.php';
							$conexion = Conectar("dideimx_ifai");
	 					?>
	 					<table class="table table-bordered table-striped table-hover">
	 						<thead>
	 							<tr>
	 								<th> Consecutivo </th>
	 								<th> Tema        </th>
	 								<th colspan="3"> Accion</th>
	 							</tr>
	 						</thead>
	 						<tbody>
	 							<?php
	 								$consulta ="SELECT * FROM comisiones";
	 								$respuesta=$conexion->query($consulta);
	 								$paginas=$respuesta->num_rows;
	 								$paginas=$paginas/10;
	 								while($comisiones=$respuesta->fetch_assoc()){
	 								?>
	 								<tr>
	 									<td><?php echo $comisiones['consecutivo'];?></td>
	 									<td><?php echo $comisiones['tema'];?></td>
	 									<td><a href="index.php?id=4&usr=adm&co=<?php echo $comisiones['id_comision']; ?>">ver</a></td>
	 									<td><a href="index.php?id=5&co=<?php echo $comisiones['id_comision']; ?>">Editar</a></td>
	 									<td><a href="#">Eliminar</a></td>
	 								</tr>
	 								<?php
	 								}
	 							?>
		 					<!--	<ul class="pagination col-xs-12">
								  <li>
								    <a href="#">&laquo;</a>
								  </li>
								  <?php
								  	$cont = 1;
								  	while($cont<$paginas){
								  		?>
								  		<li>
								  			<a href="#"><?php echo $cont ;?></a>
								  		</li>
								  	<?php
								  		$cont ++;
								  	}		
								  ?>
								  <li><a href="#">&raquo;</a></li>
								</ul>-->
	 						</tbody>
	 					</table>
	 				</div>
	 			</div>
	 		</div>
 		</div>
 	</div>
 	<?php
 }
?>