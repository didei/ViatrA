<?php
    if ($_SESSION['rol'] == ""){
        header( "Status: 301 Moved Permanently", false, 301);
        header("Location: ../");
        exit();
    }else{
 ?>
 	<br>
 	<div class="row">
 		<div class="col-xs-12 col-md-6 col-md-offset-3">
	 		<div class="panel panel-default">
	 			<div class="panel-heading">
	 				<div class="panel-title">
	 					<h5> Subir Foto</h5>
	 				</div>
	 			</div>
	 			<div class="panel-body">
	 				<legend> Agregar la foto de perfil del servidor</legend>
	 				<form enctype="multipart/form-data" action="savefile.php" method="POST">
	 					<div class="form-group">
	 						<input type="hidden" value="<?php echo $_GET['usr'];?>" name="uid">
	 						<input type="file" name="foto" id="FILE">
	 					</div>
	 					<input type="submit" Value="Guardar Imagen">
	 				</form>
	 			</div>
	 		</div>
	 		<button class="btn btn-primary btn-md btn-block" onclick="location.href='?id=100'" ?> Seguir sin Cargar Foto  </button>
 		</div>
 	</div>
 <?php
	}
 ?>