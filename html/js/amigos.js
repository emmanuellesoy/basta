function agregar(){
	
	var id_d = 1; //id del usuario destinatario
	var id_r = 7; //id del usuario remitente

	var uri = 'http://turing.izt.uam.mx/basta/index.php/amigos/agregar_amigos?callback=?';
	$.getJSON(uri,{id_destinatario: id_d,id_remitente: id_r},
    function(data){
    //alert(data); // data es el json cargado por jsonp
    	$('body').html(data.mensaje);
    });
}

$(document).bind('pagebeforecreate', function(){	
		obtener();
		peticiones();
});

function obtener(){
	
	var id = 1; // Id del usuario local.
	var uri = 'http://turing.izt.uam.mx/basta/index.php/amigos/obtener_amigos?callback=?';
	
	$.getJSON(uri,{id_usuario:id},
    function(data){

		$.each(data, function(index, value){
			if(index != 'mensaje'){
            	//$('#lista_amigos').prepend(index+':'+value.usuario_id+'-->'+value.nombre_usuario+'<br />');
            	$('#lista_amigos').prepend('<li data-icon="flechaDerecha"><a href="?">'+value.nombre_usuario+'</a></li>');
        	}
		});    

	});
}
	
function peticiones(){
	
	var id = 2; //id del usuario local
	var uri = 'http://turing.izt.uam.mx/basta/index.php/amigos/peticiones?callback=?';
	
	$.getJSON(uri,{id_usuario:id},
    function(data){

		$.each(data, function(index, value){
			if(index != 'mensaje'){
            	//$('#lista_amigos').prepend(index+':'+value.usuario_id+'-->'+value.nombre_usuario+'<br />');
            	$('#peticiones').prepend('<li data-icon="flechaDerecha"><a href="?">'+value.nombre_usuario+'</a></li>');
        	}
		});    

	});   
}

function peticion_leida(){
	
	var id_d = 1; //id del usuario local (destinatario)
	
	var id_r = 1;	//Remitente usuario id
	
	var Responder_peticion = 1; //0 sino lo acepto1 si lo acepto
	
	var uri = 'http://turing.izt.uam.mx/basta/index.php/amigos/peticion_leida?callback=?';
	$.getJSON(uri,{id_destinatario: id_d,id_remitente: id_r,aceptar:Responder_peticion},
    function(data){
    //alert(data); // data es el json cargado por jsonp
    	$('body').html(data.mensaje);
    });		
}