$(document).ready(function(){
    
});

function registrar(){
    var usuario = $('#usuario').val();
    
    var pass = $('#contrasena').val();
     
    var pass_2 = $('#c_contrasena').val();
    
    var uri = "http://turing.izt.uam.mx/basta/index.php/welcome/registrar_usuario/"+usuario+"/"+pass_2;
    
    if(pass == pass_2){
    	
    $.ajax({
            url: uri,
            success: function(data){
            	//alert('OK');
                //var json = jQuery.parseJSON(data);
                /*$('p').html(json.nombre);*/
            }
    });
    	
    } else {
    	
    	alert('Las contraseñas no coinciden');
    	
    }
    
    
    
}

function buscar(){
	
    var cadena = $('#agregar_amigo').val();
     
    alert(cadena);
    
    $.ajax({
            url: "http://turing.izt.uam.mx/basta/index.php/welcome/buscar_usuario/"+cadena,
            success: function(data){
                var json = jQuery.parseJSON(data);
                //alert(json);
                //$('p').html(json.nombre);
            }
    });
    
}

function autenticar(){
	
	var usuario = $('#usuario').val();
	
	var pass = $('#contrasena').val();
	
	var uri = "http://turing.izt.uam.mx/basta/index.php/welcome/autenticar/"+usuario+"/"+pass;
	
	alert(uri);
	
	$.ajax({
            url: uri,
            success: function(data){
                var json = jQuery.parseJSON(data);
                alert(json);
                //$('p').html(json.nombre);
            }
    });
	
}
