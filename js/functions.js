//BÚSQUEDA ASÍNCRONA DE USUARIOS
if ( typeof XMLHttpRequest == "undefined" )
XMLHttpRequest = function(){return new ActiveXObject(navigator.userAgent.indexOf("MSIE 5") >= 0 ?"Microsoft.XMLHTTP" : "Msxml2.XMLHTTP2");};

var completar = new XMLHttpRequest();

function autocompletar(){
    criterio = document.getElementById('criterio').value;
    url = "autocomplete.php?criterio="+criterio;
    
    completar.open("GET", url, true);
	completar.onreadystatechange=function(){
	    if(completar.readyState==4){
                respuesta = completar.responseText;
                opciones = document.getElementById('opciones');
                
                //hacer visible el div opciones y cargar el contenido de respuesta de autocompletar.php
                opciones.style.display='block';
                opciones.innerHTML = respuesta;
                //para que el div opciones no se muestre si no hay texto en criterio
                if(criterio==''){
                    opciones.style.display = 'none';
                }
	    }
	}
    completar.send(null);
}

function reemplazar_criterio(texto, id){
	document.getElementById('se').value=id;
    document.getElementById('criterio').value=texto;
    document.getElementById('opciones').style.display='none';
}

function seguir(serv, usuario){
	$.ajax({
		url : "./seguir.php",
		type: 'post',
		dataType: 'text',
		data: 'servidor='+serv+'&usuario='+usuario,
		success: function(res){
			if(res==1){
				location.reload();
			}
		}
	});
}