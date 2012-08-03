function autenticar(){
    
   
    //alert(usuario+' '+contrasena);
    
    var uri = 'http://turing.izt.uam.mx/basta/index.php/welcome/autenticar/';
    
    //alert(uri);
    
    $.ajax({
        url: uri,
        type: 'post',
        dataType: 'html',
        data: $("#autenticar").serialize(),
        success: function(data){
            alert(data);
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
            alert(thrownError);

        }
    });
    /*
    $.post(uri, $("#autenticar").serialize(),
        function(data) {
            alert(data);
    });
    */
}

function buscar_usuario(){
    
    var uri = 'http://turing.izt.uam.mx/basta/index.php/welcome/buscar_usuario/sha';
    
    $.ajax({
        url: uri,
        dataType: 'json',
        success: function(data){
            var json = jQuery.parseJSON(data);
            alert(json[2].usuario_id);
            //json = jQuery.parseJSON(json)
            //alert(json.usuario_id);
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
            alert(thrownError);

        }
    });
    
}