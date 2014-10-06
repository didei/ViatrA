<?php
	if ($_SESSION['rol'] == ""){
    	header( "Status: 301 Moved Permanently", false, 301);
      	header("Location: ../");
      	exit();
  	}
 	else{?>
 	<div class="row">
 		<div class="col-xs-12 text-center">
 			<h1> Servidores </h1>
 		</div>
 		<div class="col-xs-12">
	 		<div class="panel panel-default">
	 			<div class="panel-heading">
	 				<h5> Listado de 
	 					servidores</h5>
	 			</div>
	 			<div class="panel-body">
	 				<div class=" col-xs-12 table-responsive">
	 					<?php
							$conexion = Conectar("dideimx_ifai");
	 					?>
	 					<table class="table table-bordered table-striped table-hover">
	 						<thead>
	 							<tr>
	 								<th> Servidor </th>
	 								<th> Cargo</th>
	 								<th> Grupo</th>
	 								<th> Unidad Administrativa</th>
	 								<th colspan="3"> Accion</th>
	 							</tr>
	 						</thead>
	 						<tbody>
	 							<?php
	 								$consulta ="SELECT s.uid,estatus, nombre, primer_apellido, segundo_apellido, cargo, unidad_administrativa as ua, grupo
												FROM usuarios as u, servidores as s WHERE s.uid = u.uid && u.rol =1 ORDER BY primer_apellido ASC";
	 								$respuesta=$conexion->query($consulta);
	 								$paginas=$respuesta->num_rows;
	 								$paginas=$paginas/20;
	 								$estatus=$servidores['estatus'];
	 								while($servidores=$respuesta->fetch_assoc()){
	 								?>
	 								<tr <?php if($servidores['estatus']!=0) echo"class='warning'";?>>
	 									<td><a href="index.php?id=6&es=<?php echo $servidores['uid'];?>"><?php echo $servidores['primer_apellido']." ".$servidores['segundo_apellido']." ".$servidores['nombre'];?></a></td>
	 									<td><?php echo $servidores['cargo'];?></td>
	 									<td><?php echo $servidores['grupo'];?></td>
	 									<td><?php echo $servidores['ua'];?></td>
	 									<td><a href="index.php?id=1&es=<?php echo $servidores['uid'];?>">Editar</a></td>
	 									<td><a href="delusuario.php?acc=2&usr=<?php echo $servidores['uid'];?>">Eliminar</a></td>
	 									 <?php 
	 									 	if($servidores['estatus']!=0){
	 											echo "<td><a href='delusuario.php?acc=0&usr=".$servidores['uid']."'>Desbloquear</a></td>";
	 										}
	 										else{
	 											echo "<td><a href='delusuario.php?acc=1&usr=".$servidores['uid']."'>Bloquear</a></td>";
	 										}
	 									?>
	 								</tr>
	 								<?php
	 								}
	 							?>
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
