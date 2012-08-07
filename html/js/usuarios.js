//base de datos local
var db;
function init() {
	db = openDatabase("DB_local2", "0.1", "Database_local2", 200000);
    if (db) {
    	// Database opened
		db.transaction( function(tx) {
			tx.executeSql("CREATE TABLE IF NOT EXISTS usuario(id_usuario integer primary key)")
		});
	}
	listUsers();
}

function showUsers(users) {
	var place = document.getElementById("id_usr");
	if (place.getElementsByTagName("ul").length > 0 )
		place.removeChild(place.getElementsByTagName("ul")[0]);
		var list = document.createElement("ul");
	for ( var i = 0; i < users.length; i++) {
		var item = document.createElement("li");
		item.innerHTML += "<b>userId:</b>" + users[i][0] +
		"<button onclick='removeUser("+ users[i][0]+")'>Remove</button>";
		list.appendChild(item);
	}
	place.appendChild(list);
}

function listUsers() {
	db.transaction( function(tx) {
		tx.executeSql("SELECT * FROM usuario", [],
		function(tx, result){
			var output = [];
			for(var i=0; i < result.rows.length; i++) {
				output.push([result.rows.item(i)['id_usuario']]);
			}
			showUsers(output);
		});
	});
}

function addUser(id_usuario) {
	db.transaction( function(tx) {
		tx.executeSql("INSERT INTO usuario(id_usuario) VALUES(?)", [id_usuario]);
	});
	listUsers();
}

function removeUser(id_usuario) {
	db.transaction(function(tx) {
		tx.executeSql("DELETE FROM usuario WHERE id_usuario=?",[id_usuario], listUsers);
	})
}
/*=========================================================================================================================*/
//funciones generales
function autenticar(){

	
	var usuario = $('#usuario').val();
	var pass = $('#contrasena').val();
	var uri = 'http://turing.izt.uam.mx/basta/index.php/welcome/autenticar?callback=?';
	
	$.getJSON(uri,{usuario: usuario,contrasena: pass},
    function(data){
    	if(data.mensaje == 'ok'){
			$('#id_usr').prepend('<p>'+data.id_usuario+'<p>');
			addUser(data.id_usuario);
			//window.location = 'menuPrincipal.html'
		}else{
			$('#error_message').html('');
			$('#error_message').prepend('<p>Usuario o contraseña no validos<p>');
		}
	});
	
}

function registrar(){
	
    var usuario = $('#usuario').val();   
    var pass = $('#contrasena').val();
    var pass_2 = $('#c_contrasena').val();
	
	if(pass==pass_2){	
		var uri = 'http://turing.izt.uam.mx/basta/index.php/welcome/registrar_usuario?callback=?';
		$.getJSON(uri,{usuario: usuario, contrasena:pass_2},
    	function(data){
    		if(data.mensaje == 'usuario_existente'){
    			$('#mensaje_error').html('');
    			$('#mensaje_error').prepend('<p>Usuario no disponible<p>');
    		}
    		else{
    			$('#id_usr').prepend('<p>'+data.id_usuario+'<p>');
    			addUser(data.id_usuario);
    			//window.location = 'menuPrincipal.html'
    		}
    	});
   	}else{
		$('#id_usr').preppend('<p>Las contraseñas no coinciden</p>');
   	}
}

function buscar(){

	var cadena = $('#agregar_amigo').val();
	
	var uri = 'http://turing.izt.uam.mx/basta/index.php/welcome/buscar_usuario?callback=?';
	$.getJSON(uri,{nombre_usuario: cadena},
    function(data){
    //alert(data); // data es el json cargado por jsonp
    	$('body').html(data.mensaje);
    });
}