function autenticar(){
    
   
    //alert(usuario+' '+contrasena);
    
    var uri = 'http://turing.izt.uam.mx/basta/index.php/welcome/autenticar/';
    
    $.post(uri, $("#autenticar").serialize(),
        function(data) {
            alert(data);
    });
    
}