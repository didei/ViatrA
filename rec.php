<?php
	include_once("include/conexion.php");
	$conexion = Conectar();
	
	$uid = urldecode($_GET["i"]);
	$fecha = urldecode($_GET["f"]);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>Viajes Transparentes</title>
        <link href="./favicon.ico" type="image/x-icon" rel="shortcut icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <script src="http://code.jquery.com/jquery-latest.js" type='text/javascript'></script>
        <script src="./js/bootstrap.js" type="text/javascript" ></script>
        <script>
			$(document).ready(function(){
				var left;
				$("#mensaje-rec").css("display","none");
				$(".titulo span").css("display","");
			});

			$(function() {
   	
				$("#pass").keyup(function(){
					if($("#pass").val().match(/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*/)) {
						$("#pass-rec").removeClass("has-error");
						$("#pass-rec span").removeClass("glyphicon-remove");
						$("#pass-rec").addClass("has-success has-feedback");
						$("#pass-rec span").addClass("glyphicon-ok");
					}else{
						$("#pass-rec").removeClass("has-success");
						$("#pass-rec span").removeClass("glyphicon-ok");
						$("#pass-rec").addClass("has-error has-feedback");
						$("#pass-rec span").addClass("glyphicon-remove");
					}
				});
				
				$("#pass2").keyup(function(){
					if($("#pass").val()==$("#pass2").val() && $("#pass2").val().match(/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*/)) {
						$("#pass-rec2").removeClass("has-error");
						$("#pass-rec2 span").removeClass("glyphicon-remove");
						$("#pass-rec2").addClass("has-success has-feedback");
						$("#pass-rec2 span").addClass("glyphicon-ok");
					}else{
						$("#pass-rec2").removeClass("has-success");
						$("#pass-rec2 span").removeClass("glyphicon-ok");
						$("#pass-rec2").addClass("has-error has-feedback");
						$("#pass-rec2 span").addClass("glyphicon-remove");
					}
				});
				
				$('#recuperar').click(function() {
					var pass = $('#pass').val();
					var pass2 = $('#pass2').val();
					var uid = $('#uid').val();
					
					$("#mensaje-rec").css("display","none");
					$("#rec_pass .alert").removeClass("alert-info alert-danger");
	
					if(pass2 == ''){
						$('#pass2').focus();
						$("#pass-rec2").addClass("has-error");
						$("#pass-rec2 span").addClass("glyphicon-remove");
						$("#mensaje-rec").css("display","none");
					}
					if(pass == ''){
						$('#pass').focus();
						$("#pass-rec").addClass("has-error");
						$("#pass-rec span").addClass("glyphicon-remove");
						$("#mensaje-rec").css("display","none");
					}
					
					if(pass =="" || pass2 == ""){
						return false;
					}
					
					if(pass != pass2){
						$("#mensaje-rec").css("display","block");
						$("#mensaje-rec").text("Favor de verificar las contraseñas");
						$("#rec_pass .alert").addClass("alert-warning");
						$("#rec_pass .alert").removeClass("alert-danger alert-info");
						return false;
					}
					
					$.ajax({
						url : "./nueva_cont.php",
						type: 'post',
						dataType: 'text',
						data: 'pass='+pass+"&pass2="+pass2+"&uid="+uid,
						success: function(res){
							if(res==1){
								$("#mensaje-rec").css("display","block");
								$("#mensaje-rec").text("Cambio de contraseña exitoso - Será redireccionado en 5 segundos");
								$("#rec_pass .alert").removeClass("alert-danger alert-warning");
								$("#rec_pass .alert").addClass("alert-info");
								setTimeout(function(){ document.location="./"; },5000);
							}else{
								$("#mensaje-rec").css("display","block");
								$("#mensaje-rec").text("Error al cambiar la contraseña. Favor de intentar nuevamente");
								$("#rec_pass .alert").removeClass("alert-warning alert-info");
								$("#rec_pass .alert").addClass("alert-danger");
							}
						}
					});
				});
			});
				
		</script>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/bootstrap-theme.css">
        <link rel="stylesheet" href="./css/css.css">
    </head>
    
    <body>
    	<div id="header">
        	<div id="img-header">
        		<img src="./imgs/logoifai.png" alt="" />
            </div>
            <div id="titulo">Viajes Transparentes</div>
            <div id="img-maleta">
        		<img src="./imgs/maleta-main.png" alt="" />
            </div>
        </div>
    	<div class="contenido">
        	<div id="sec">
                <div class="seccion" id="rec_pass">
        	<?php			
				$uid = decrypt($uid);
				$fecha = decrypt($fecha);
				
				$sql = "SELECT * FROM usuarios WHERE uid = '$uid'";
				$res = $conexion->query($sql);
				$num = $res->num_rows;
				if($num==1){
					$fecha_actual = new DateTime(date("d-m-Y G:i:s"));
					$fecha = new DateTime($fecha);
					
					$interval = $fecha_actual->diff($fecha);
					$anios = $interval->format("%Y");
					$meses = $interval->format("%m");
					$dias = $interval->format("%d");
					$horas = $interval->format("%H");
					
					if($dias>0||$meses>0||$anios>0||$horas>=6){
					?>
						<div class="form row" id="tiempo-exc">
                        	<div class="titulo col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 warning"><span class="glyphicon glyphicon-chevron-right"></span>Recuperar Contraseña</div>
                            <div class="alert alert-info col-xs-12 col-sm-10 col-sm-offset-1" role="alert" id="e-date">
                            	Su solicitud de cambio de contraseña ha expirado
                            </div>
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1" role="alert" id="reg-log">
                            	<a href="./"><div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 boton-registro"><span class="glyphicon glyphicon-lock"></span></div></a>
                            </div>
                        </div>
                    <?php
					}else{
					?>
						<div class="form row">
                            <div class="titulo col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1"><span class="glyphicon glyphicon-chevron-right"></span>Cambiar Contraseña</div>
                            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 info">
                                Ingrese su nueva contraseña, tomando en cuenta que debe contener al menos 8 caracteres, entre los cuales exista una letra mayúscula, una minúscula y un carácter especial o número .
                            </div>
                            <div class="row">
                                <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group has-feedback" id="pass-rec">
                                            <div class="col-sm-12">
                                                <input type="password" class="form-control" id="pass" placeholder="Nueva contraseña">
                                                <span class="glyphicon form-control-feedback"></span>
                                            </div>
                                        </div>
                                        <div class="form-group has-feedback" id="pass-rec2">
                                            <div class="col-sm-12">
                                                <input type="password" class="form-control" id="pass2" placeholder="Confirme contraseña">
                                                <span class="glyphicon form-control-feedback"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-7 col-xs-6">
                                            	<input type="hidden" name="uid" id="uid" value="<?php echo $uid; ?>" />
                                                <button type="submit" class="btn btn-default" id="recuperar" onClick="return false;">Continuar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="alert" role="alert" id="mensaje-rec"></div>
                                </div>
                            </div>
                        </div>
            <?php
					}
				} 
			?>
                </div>
            </div>
    	</div>
        <div class="footer">
        	<img src="./imgs/img-foo-cont.png" alt="" />
            <br />
            &copy; Todos los Derechos Deservados a ifai.org.mx 2014
        </div>
    </body>
</html>