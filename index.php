<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>Viajes Transparentes</title>
        <link href="./favicon.ico" type="image/x-icon" rel="shortcut icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <script src="http://code.jquery.com/jquery-latest.js" type='text/javascript'></script>
        <script src="./js/bootstrap.js" type="text/javascript" ></script>
        <script src="./js/js.js" type="text/javascript" ></script>
        <script src="./js/modernizr.custom.46539.js" type="text/javascript" ></script>
        <script src="./js/prefixfree.dynamic-dom.js" type="text/javascript" ></script>
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
                    <div class="form row">
                        <div class="titulo col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1"><span class="glyphicon glyphicon-chevron-right"></span>Recuperar Contraseña</div>
                        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 info">
                            Para reajustar su contraseña, envíe su dirección de correo electrónico con la que se registró. Si podemos encontrarlo en la base de datos, le enviaremos un email con instrucciones para poder acceder de nuevo.
                        </div>
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-1">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group has-feedback" id="email-div-rec">
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" id="email-rec" placeholder="Email">
                                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-7 col-xs-6">
                                            <button type="submit" class="btn btn-default" id="recuperar" onClick="return false;">Continuar</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="alert" role="alert" id="mensaje-rec"></div>
                                <div class="progress">
                                  	<div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">Procesando solicitud
                                  	</div>
                                </div>
                            </div>
                            <a href="#login" onClick="return false;"><div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 boton-registro"><span class="glyphicon glyphicon-lock"></span></div></a>
                        </div>
                    </div>
                </div>
                <div class="seccion" id="login">
                    <div class="form row">
                        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 info">
                            Transparentar inteligentemente la información pública que se genera sobre los viajes de trabajo nacionales e internacionales de los comisionados y los servidores públicos del IFAI para fomentar un debate público informado
                        </div>
                        <div class="titulo col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1"><span class="glyphicon glyphicon-chevron-right"></span>Iniciar Sesión</div>
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-1">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group has-feedback" id="email-div">
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" id="email" placeholder="Email">
                                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback" id="pass-div">
                                        <div class="col-sm-12">
                                            <input type="password" class="form-control" id="pass" placeholder="Contraseña">
                                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-7 col-xs-6">
                                            <button type="submit" class="btn btn-default" id="ingresar" onClick="return false;">Ingresar</button>
                                        </div>
                                        <div class="col-sm-4 col-xs-4" id="olv-cont">
                                            <a class="btn btn-link" href="#rec_pass" onClick="return false;">Olvidé mi contraseña</a>
                                        </div>
                                    </div>
                                </form>
                                <div class="alert alert-danger" role="alert" id="error">Error al Iniciar Sesión - Verifique su Correo y Contraseña</div>
                            </div>
                            <a href="#register" onClick="return false;"><div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 boton-registro">Regístrate</div></a>
                        </div>
                    </div>
                </div>
                <div class="seccion" id="register">
                    <div class="form">
                        <div class="titulo col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1"><span class="glyphicon glyphicon-chevron-right"></span>Registro</div>
                        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 info">
                            Los campos con * son obligatorios
                        </div>
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-1">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group has-feedback" id="name-div">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="name" placeholder="Nombre *">
                                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback" id="pa-div">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pa" placeholder="Primer Apellido *">
                                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback" id="sa-div">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="sa" placeholder="Segundo Apellido *">
                                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback" id="email-div-reg">
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" id="email-reg" placeholder="Email *">
                                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-default" id="registrar" onClick="return false;">Registrar</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="alert alert-danger" role="alert" id="error-registro">Error al registrar sus datos - El correo que ingresó ya está registrado</div>
                                <div class="alert alert-info" role="alert" id="exito-registro">Exito al registrar sus datos - Se le envió su contraseña al correo que ingresó</div>
                                <div class="alert alert-danger" role="alert" id="error-envio">Error al enviarle los datos a su correo - Es posible que ese correo no exista</div>
                            </div>
                            <a href="#login" onClick="return false;"><div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 boton-registro"><span class="glyphicon glyphicon-lock"></span></div></a>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
        <div class="footer">
        	<img src="./imgs/img-foo-cont.png" alt="" />
            <br />
            &copy; Todos los Derechos Deservados a ifai.org.mx 2014
        </div>
        <script>
			$(document).ready(function(){
				sec = "#login";
				$('.contenido').scrollLeft($(sec).offset().left);
			});
		</script>
    </body>
</html>