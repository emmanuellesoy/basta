$(document).ready(function(){
    
});

function agregar(){
	
	var id_d = 1; //id del usuario destinatario
	
	var id_r = 7; //id del usuario remitente
	
	alert(id_d+id_r);
	
	$.ajax({
            url: "http://turing.izt.uam.mx/basta/index.php/amigos/agregar_amigos/"+id_d+"/"+id_r,
            success: function(data){
                var json = jQuery.parseJSON(data);
                //alert(json);
                //$('p').html(json.nombre);
            }
    });
	
}

function obtener(){
	
	var id = 1; // Id del usuario local.
	
	alert(id);
	
	$.ajax({
            url: "http://turing.izt.uam.mx/basta/index.php/amigos/obtener_amigos/"+id,
            success: function(data){
                var json = jQuery.parseJSON(data);
                //alert(json);
                //$('p').html(json.nombre);
            }
    });
	
}

function peticiones(){
	
	var id = 2; //id del usuario local
	
	alert(id);
	
	$.ajax({
            url: "http://turing.izt.uam.mx/basta/index.php/amigos/peticiones/"+id,
            success: function(data){
                var json = jQuery.parseJSON(data);
                //alert(json);
                //$('p').html(json.nombre);
            }
    });
	
}

function peticion_leida(){
	
	var id_d = 1; //id del usuario local (destinatario)
	
	var id_r = 1;	//Remitente usuario id
	
	var Responder_peticion = 1; //0 sino lo acepto1 si lo acepto
	
	alert(id_d+id_r);
	
	$.ajax({
            url: "http://turing.izt.uam.mx/basta/index.php/amigos/peticion_leida/"+id_d+"/"+id_r+"/"+Responder_peticion,
            success: function(data){
                var json = jQuery.parseJSON(data);
                //alert(json);
                //$('p').html(json.nombre);
            }
    });
	
}