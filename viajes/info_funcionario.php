 <?php
  if ($_SESSION['rol'] == ""){
      header( "Status: 301 Moved Permanently", false, 301);
        header("Location: ../");
        exit();
    }
  else{?>   
    <div class="row"> 
      <div class="col-md-10 col-lg-10 col-md-offset-1" id="perfil">
      	<div class="panel panel-default">
    			<?php
            $uid = clear_string($conexion, $_GET['es']); 
    			  $busqueda = "SELECT *
                      FROM usuarios as u, servidores as s
                      WHERE u.uid = '$uid' && s.uid = u.uid";
            $Resultado = $conexion->query($busqueda);
            $Filas = $Resultado->fetch_array();
          ?>
      		<div class="panel-heading">
        		<h3 class="panel-title"><?php echo $Filas['nombre']." ".$Filas['primer_apellido']." ".$Filas['segundo_apellido'];?></h3>
      		</div>
      		<div class="panel-body row">            
      			<img src="../imgs/servidores/<?php echo $Filas['img'];?>" class="img-responsive img-circle col-md-4 col-lg-2 col-sm-2 col-xs-3" alt="">
              <div class="col-xs-8 col-sm-10 col-md-8">
                <dl class="dl-horizontal">
                  <dt>Email</dt>	
                  <dd><?php echo $Filas['email'] ?></dd>
                  <dt>Cargo</dt>	
                  <dd><?php echo $Filas['cargo'] ?></dd>
                  <dt>Unidad Administrativa</dt>
                  <dd><?php echo $Filas['unidad_administrativa'] ?></dd>
                  <dt>Tipo de Personal</dt>
                  <dd><?php echo $Filas['tipo_personal'] ?></dd>
                  <dt>Grupo</dt>
                  <dd><?php echo $Filas['grupo'] ?></dd>
                  <dt>Puesto</dt>
                  <dd><?php echo $Filas['nombre_puesto'] ?></dd>
                  <dt>Superior Directo</dt>
                  <dd><?php echo $Filas['cargo_superiror'] ?></dd>
                </dl>
              </div>  
          </div>
      	</div>
      </div>
    </div>
    <?php
  }
?>