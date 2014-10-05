<?php
	if ($_SESSION['rol'] == ""){
    	header( "Status: 301 Moved Permanently", false, 301);
      	header("Location: ../");
      	exit();
  	}
 	else{?>
  	<div class="row">
  		<div class="col-md-6 col-lg-6">
  			<div class="panel panel-default">
  				<div class="panel-heading">
  					<h3 class="panel-title"> HOY </h3>
  				</div>
  				<div class="panel-body">
  					<?php
  					@include './include/conexion.php';
						$conexion = Conectar("dideimx_ifai");
						$hoy = date("Y-m-d");

						$conteo ="SELECT count(id_comision) AS 'comisiones' FROM comisiones WHERE fechainicio_com = '$hoy'";
						$ncomisiones=$conexion->query($conteo);
						$com=$ncomisiones->fetch_array();
						
						$conteo ="SELECT count(uid) AS 'usuarios' FROM usuarios WHERE fecha_alta = '$hoy'";
						$nusuarios=$conexion->query($conteo);
						$usr=$nusuarios->fetch_array();

						$conteo ="SELECT count(id_comision) AS 'act' FROM actualizaciones WHERE fecha = '$hoy'";
						$nupdates=$conexion->query($conteo);
						$update=$nupdates->fetch_array();
  					?>
  					<div class="col-xs-10 col-md-6"> Comisiones:</div>
  					<div class="col-xs-1 col-xs-offset-0 col-md-offset-5"> <?php echo $com['comisiones'];?></div>
  					<div class="col-xs-10 col-md-6"> Usuarios:</div>
  					<div class="col-xs-1 col-xs-offset-0 col-md-offset-5"> <?php echo $usr['usuarios'];?></div>
  					<div class="col-xs-10 col-md-6"> Comisiones Actualizadas:</div>
  					<div class="col-xs-1 col-xs-offset-0 col-md-offset-5"> <?php echo $update['act'];?></div>
  				</div>
  			</div>
  		</div>
  		<div class="col-md-6 col-lg-6">
  			<div class="panel panel-success">
  				<div class="panel-heading">
  					<h3 class="panel-title"> Acciones </h3>
  				</div>
  				<div class="panel-body">
  					<button class="btn btn-primary btn-md btn-block" onclick="location.href='?id=2'" ?> Agregar Servidor</button>
  				</div>
  			</div>
  		</div>
  		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
  			<div class="panel panel-info">
  				<div class="panel-heading">
  					<h3 class="panel-title"> Estadisticas de Viajes Transparentes</h3>
  				</div>
  				<div class="panel-body">
  					<?php
						$conteo ="SELECT count(id_comision) AS 'comisiones' FROM comisiones";
						$tcomisiones=$conexion->query($conteo);
						$tcom=$tcomisiones->fetch_array();
						
						$conteo ="SELECT count(uid) AS 'usuarios' FROM usuarios";
						$tusuarios=$conexion->query($conteo);
						$tusr=$tusuarios->fetch_array();

						$conteo ="SELECT count(uid) AS 'act' FROM servidores";
						$tupdates=$conexion->query($conteo);
						$tupdate=$tupdates->fetch_array();
  					?>
  					<div class="col-xs-10 col-md-6"> <strong>Total de Comisiones:</strong></div>
  					<div class="col-xs-1 col-xs-offset-0 col-md-offset-5"> <?php echo $tcom['comisiones'];?> </div>
  					<div class="col-xs-10 col-md-6"> <strong>Total de Usuarios:</strong></div>
  					<div class="col-xs-1 col-xs-offset-0 col-md-offset-5"> <?php echo $tusr['usuarios'];?></div>
  					<div class="col-xs-10 col-md-6"> <strong>Total de Servidores:</strong></div>
  					<div class="col-xs-1 col-xs-offset-0 col-md-offset-5"> <?php echo $tupdate['act'];?></div>
  				</div>
  			</div>
  		</div>
  	</div>
 <?php
	}
 ?>