<?php
    if ($_SESSION['rol'] == ""){
        header( "Status: 301 Moved Permanently", false, 301);
        header("Location: ../");
        exit();
    }else{?>
    <div class="row">
    	<div class="col-xs-12 text-center">
    		<h1> Alta de Servidor</h1>
    	</div>
    	<div class ="col-xs-12 col-sm-10 col-sm-offset-1">
    		<form role="form">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<h3 class="panel-title"> Datos del Servidor</h3>
    				</div>
    				<div class="panel-body">
    					<legend> Datos Generales</legend>
    					<div class="form-group col-xs-12 col-sm-4">
    						<label> Nombre</label>
    						<input type ="text" class="form-control" id="nombre" placeholder="Nombre(s)">
    					</div>
    					<div class="form-group col-xs-12 col-sm-4">
    						<label> Apellido Paterno</label>
    						<input type ="text" class="form-control" id="papellido" placeholder="Primer Materno">
    					</div>
    					<div class="form-group col-xs-12 col-sm-4">
    						<label> Apellido Materno</label>
    						<input type ="text" class="form-control" id="sapellido" placeholder="Primer Materno">
    					</div>
    					<div class="form-group col-xs-12 col-sm-4">
    						<label> Tipo de Personal</label>
    						<input type ="text" class="form-control" id="tpersonal" placeholder="Tipo de Personal">
    					</div>
    					<div class="form-group col-xs-12 col-sm-4">
    						<label> Cargo </label>
    						<input type ="text" class="form-control" id="cargo" placeholder="cargo">
    					</div>
    					<div class="form-group col-xs-12 col-sm-4">
    						<label> Cargo Superior</label>
    						<input type ="text" class="form-control" id="Scargo" placeholder="Cargo del Superior Directo">
    					</div>
    					<div class="form-group col-xs-12 col-sm-4">
    						<label> Unidad Administrativa</label>
    						<input type ="text" class="form-control" id="uadminitrtiva" placeholder="Unidad administrativa">
    					</div>
    					<div class="form-group col-xs-12 col-sm-4">
    						<label> Grupo </label>
    						<input type ="text" class="form-control" id="grupo" placeholder="Grupo">
    					</div>
    					<div class="form-group col-xs-12 col-sm-4">
    						<label> Nombre del puesto </label>
    						<input type ="text" class="form-control" id="puesto" placeholder="Nombre del Puesto">
    					</div>
    					<legend> Detalles de la cuenta de usuario</legend>
    					<div class="form-group col-xs-12 col-sm-6">
    						<label> Correo Electronico </label>
    						<input type ="text" class="form-control" id="email" placeholder="e-mail">
    					</div>
    					<div class="form-group col-xs-12 col-sm-6">
    						<label> Contraseña </label>
    						<input type ="password" class="form-control" id="pass" placeholder="Contraseña">
    					</div>
    					<div class="form-group col-xs-12 col-sm-12">
    						<label> Fotografia </label>
    						<input type ="file" id="foto">
    					</div>
    					 <button type ="submit" class="btn btn-primary" id="add" onClick="return false;">Guardar</button>
    				</div>
    			</div>
    		</form>
    		<button class="btn btn-warning" onclick="location.href='?id=1'">Regresar</button>
    	</div>
    </div>
 <?php
	}
 ?>
 <script>
 	$(function(){
 		$('#add').click(function(){
 			var nombre   	  = $('#nombre').val();
 			var papellido	  = $('#papellido').val();
 			var sapellido	  = $('#sapellido').val();
 			var tpersonal	  = $('#tpersonal').val();
 			var cargo 	 	  = $('#cargo').val();
 			var scargo   	  = $('#Scargo').val();
 			var uadminitrtiva = $('#uadminitrtiva').val();
 			var grupo         = $('#grupo').val();
 			var puesto        = $('#puesto').val();
 			var email         = $('#email').val();
 			var pass 		  = $('#pass').val();

 			if(nombre == '' || nombre == null){
                $('#nombre').focus();
                $("#nombre-div").addClass("has-error");
            }
            if(papellido == '' || papellido == null){
                $('#papellido').focus();
                $("#papellido-div").addClass("has-error");
            }
            if(sapellido == '' || sapellido == null){
                $('#sapellido').focus();
                $("#sapellido-div").addClass("has-error");
            }
            if(tpersonal == '' || tpersonal == null){
                $('#tpersonal').focus();
                $("#tpersonal-div").addClass("has-error");
            }
            if(cargo == '' || cargo == null){
                $('#cargo').focus();
                $("#cargo-div").addClass("has-error");
            }
            if(scargo == '' || scargo == null){
                $('#scargo').focus();
                $("#scargo-div").addClass("has-error");
            }
            if(uadminitrtiva == '' || uadminitrtiva == null){
                $('#uadminitrtiva').focus();
                $("#uadminitrtiva-div").addClass("has-error");
            }
            if(grupo == '' || grupo == null){
                $('#grupo').focus();
                $("#grupo-div").addClass("has-error");
            }
            if(puesto == '' || puesto == null){
                $('#puesto').focus();
                $("#puesto-div").addClass("has-error");
            }
            if(email == '' || email == null){
                $('#email').focus();
                $("#email-div").addClass("has-error");
            }
            if(pass == '' || pass == null){
                $('#pass').focus();
                $("#pass-div").addClass("has-error");
            }
            if( nombre == ''	 	|| nombre 			== null ||
            	papellido == ''  	|| papellido 		== null ||
            	sapellido == ''  	|| sapellido 		== null ||
            	tpersonal == ''  	|| tpersonal 		== null ||
            	cargo == '' 	 	|| cargo 			== null ||
            	scargo == '' 	 	|| scargo 			== null ||
            	uadminitrtiva == '' || uadminitrtiva 	== null ||
            	grupo == '' 		|| grupo 			== null ||
            	puesto == '' 		|| puesto 			== null ||
            	pass == '' 			|| pass 			== null){
            	return false;
            }
            if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
	            alert('Introdusca una direccion de correo electronico valida.');
	            return false;
       		}

       		var datos = {
       		'Nombre'       	  :   nombre,
       		'papellido'		  :   papellido,
       		'sapellido'		  :   sapellido,
       		'tpersonal'		  :   tpersonal,
       		'cargo'			  :   cargo,
       		'scargo'		  :   scargo,
       		'uadministrativa'	  :   uadminitrtiva,
       		'grupo'			  :   grupo,	
       		'puesto'		  :   puesto,
       		'email'			  :   email,
       		'pass'            :   pass
       		}

       		$.ajax({
       			url: "./altaservidor.php",
       			type: "post",
       			dataType: "text",
       			data: datos,
       			success: function(res){
       				if(res == 1){
       					alert('El correo electrónico ya está en uso');
       				}
       				else{
       					alert("El servidor fue dado de alta de forma exitosa");
       					location.href='?id=2';
       				}
       			}

       		});

 		});

 	});
 </script>