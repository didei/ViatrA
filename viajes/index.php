<?php
	session_start();
	if(!isset($_SESSION['uid']) || !isset($_SESSION['name-user']) || !isset($_SESSION['rol'])){
		echo "<script> document.location='../'; </script>";
		exit;
	}
	include_once('../include/conexion.php');
	$conexion = Conectar("dideimx_ifai");
	$nombre = $_SESSION['name-user'];
	$rol = $_SESSION['rol'];
	$uid = $_SESSION['uid'];
	$id = $_GET['id'];
	$co = $_GET['co'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>Viajes Transparentes</title>
        <link href="../favicon.ico" type="image/x-icon" rel="shortcut icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <script src="http://code.jquery.com/jquery-latest.js" type='text/javascript'></script>
        <script src="../js/bootstrap.js" type="text/javascript" ></script>
        <script src="../js/jquery-ui.min.js" type="text/javascript" ></script>
        <script src="../js/modernizr.custom.46539.js" type="text/javascript" ></script>
        <script src="../js/prefixfree.dynamic-dom.js" type="text/javascript" ></script>
        <script src="../js/functions.js" type="text/javascript" ></script>
        
    	<link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.css">
        <link rel="stylesheet" href="../css/jquery-ui.css" />
        <link rel="stylesheet" href="../css/jquery-ui.theme.css" />
        <link rel="stylesheet" href="../css/css.css">
        
        <script>
			$(document).ready(function(e) {
            	var pag = $(window).height();
				var header = $(".header").height();
				$(".contenido-seccion").css({"min-height":pag-70-header,"height":"100%"}); 
            });
			$(window).resize(function() {
				var pag = $(window).height();
				var header = $(".header").height();
				$(".contenido-seccion").css({"min-height":pag-70-header,"height":"100%"}); 
            });
		</script>
    	<style>
			
		</style>
    </head>
    
    <body>
    	<div class="header">
        	<div id="cont-logo">
        		<img src="../imgs/cont-logo.png" alt="" />
            </div>
            <div id="logoifai-main">
            	<img src="../imgs/logoifai.png" alt="" />
            </div>
            <div id="maleta">
            	<a href="./"><img src="../imgs/maleta-inside.png" alt="" /></a>
            </div>
            <div class="nom-usuario">
            	Bienvenid@ <?php echo $nombre; ?>
            </div>
            <div class="titulo div-header">
        		Viajes Transparentes
            </div>
            <div class="form-busqueda div-header">
            	<!--div class="row">
                  	<div class="col-lg-offset-9 col-lg-3 col-md-offset-8 col-md-4 col-sm-offset-7 col-sm-5 col-xs-offset-6 col-xs-6" id="campo-busqueda">
                    	<div class="input-group">
                      		<input type="text" class="form-control">
                      		<span class="input-group-btn">
                        		<button class="btn btn-default" type="button">Buscar</button>
                      		</span>
                    	</div><!-- /input-group -->
                  	<!--/div><!-- /.col-lg-6 -->
                <!--/div><!-- /.row -->
                <?php include("./menu.php"); ?>
            </div>
            
        	<!--div id="close">
            	<a href="?id=1000" title="Cerrar sesión" class="glyphicon glyphicon-off"></a>
            </div-->
        </div>
        <div class="contenido contenido-seccion">
        	<?php
				include_once("./main.php");
			?>
        </div>
        <div class="footer" id="f-princ">
        	&copy; Todos los Derechos Reservados al ifai.org.mx 2014
        </div>
    </body>
</html>