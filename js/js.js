var sec;
$(document).ready(function(){
	var left;
	$("div span, #error, #error-registro, #exito-registro, #error-envio, #mensaje-rec, .progress").css("display","none");
	$(".titulo span, .boton-registro span").css("display","");

	linkInterno = $('.contenido a[href^="#"]');
	linkInterno.on('click',function(e) {
		e.preventDefault();
		var href = $(this).attr('href');
		switch(sec){
			case "#register": 
			case "#rec_pass": left = $(window).width();
				break;
			case "#login":
				if(href=="#register"){
					left = $(window).width()*2;
				}else{
					left = 0;
				}
				break;
		}
		
		$('.contenido').stop(true).animate({ scrollLeft : left }, {duration: 300, queue: false});
		sec = href;
	});
	$( window ).resize(function() {
		var left;
		switch(sec){
			case "#register": left = $(window).width()*2;
				break;
			case "#rec_pass": left = 0;
				break;
			case "#login": left = $(window).width();
				break;
		}
		$('.contenido').scrollLeft(left);	
	});
});

$(function() {

	$('#recuperar').click(function() {
		var email=$('#email-rec').val();
		
		$("#mensaje-rec").css("display","none");
		$("#rec_pass .alert").removeClass("alert-info alert-danger");
		
		$(".form-group span").css("display","none");
		$(".form-group").removeClass("has-error");

		if(email == ''){
			$('#email-rec').focus();
			$("#email-div-rec").addClass("has-error");
			$("#email-div-rec span").css("display","block");
			$("#mensaje-rec").css("display","none");
			return false;
		}
		
		$.ajax({
			url : "./recuperar_cont.php",
			type: 'post',
			dataType: 'text',
			data: 'email='+email,
			beforeSend: function(){
				$(".progress").css({"display":"block"});
				$(".progress div").css({"font-size":"17px","color":"#00ffed"});
			},
			success: function(res){
				$(".progress").css("display","none");
				if(res==1){
					$("#mensaje-rec").css("display","block");
					$("#mensaje-rec").text("Se envió un código de recuperación a su correo");
					$("#rec_pass .alert").addClass("alert-info");
				}else{
					$("#mensaje-rec").css("display","block");
					$("#mensaje-rec").text("El correo ingresado no se encuentra registrado");
					$("#rec_pass .alert").addClass("alert-danger");
				}
			}
		});
	});
	$('#ingresar').click(function() {
		var email=$('#email').val();
		var pass= $('#pass').val();
		
		$(".form-group span").css("display","none");
		$(".form-group").removeClass("has-error");
		
		if(pass == ''){
			$('#pass').focus();
			$("#pass-div").addClass("has-error");
			$("#pass-div span").css("display","block");
		}
		if(email == ''){
			$('#email').focus();
			$("#email-div").addClass("has-error");
			$("#email-div span").css("display","block");
		}
		if(email == '' || pass == ''){
			$("#error").css("display","none");
			return false;
		}
		
		$.ajax({
			url : "./login.php",
			type: 'post',
			dataType: 'text',
			data: 'email='+email+"&pass="+pass,
			success: function(res){
				if(res>=0){
					$("#error").css("display","none");
					document.location="./viajes";
				}else{
					$("#error").css("display","block");
				}
				/*if(res==1){
					$("#error").css("display","none");
					document.location="./viajes";
				}else{
					$("#error").css("display","block");
				}*/
			}
		});
	});
	$('#registrar').click(function() {
		var name=$('#name').val();
		var pa=$('#pa').val();
		var sa=$('#sa').val();
		var email=$('#email-reg').val();
		
		$("#register .alert").css("display","none");
		
		$(".form-group span").css("display","none");
		$(".form-group").removeClass("has-error");
		
		if(email == ''){
			$('#email-reg').focus();
			$("#email-div-reg").addClass("has-error");
			$("#email-div-reg span").css("display","block");
		}
		if(sa == ''){
			$('#sa').focus();
			$("#sa-div").addClass("has-error");
			$("#sa-div span").css("display","block");
		}
		if(pa == ''){
			$('#pa').focus();
			$("#pa-div").addClass("has-error");
			$("#pa-div span").css("display","block");
		}
		if(name == ''){
			$('#name').focus();
			$("#name-div").addClass("has-error");
			$("#name-div span").css("display","block");
		}
		
		if(email == '' || sa == '' || pa == '' || name == ''){
			$("#error-registro").css("display","none");
			$("#exito-registro").css("display","none");
			$("#error-envio").css("display","none");
			return false;
		}
	
		$.ajax({
			url : "./registrar.php",
			type: 'post',
			dataType: 'text',
			data: 'name='+name+"&pa="+pa+"&sa="+sa+"&email="+email,
			success: function(res){
				if(res==1){
					$("#error-registro").css("display","none");
				}else if(res==2){
					$("#exito-registro").css("display","block");
					$('#name,#pa,#sa,#email-reg').val('');
				}else if(res==3){
					$("#error-envio").css("display","block");
				}else{
					$("#error-registro").css("display","block");
				}
			}
		});
	});
});