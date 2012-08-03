<?php
class Usuario extends CI_Model {
    
    public function __construct () {
        
         parent::__construct();
         
         $this->load->database();
    
    }
    
    function get_users(){
        
        $consulta = $this->db->query('SELECT usuario_id, nombre_usuario FROM usuarios');
        
        foreach ($consulta->result_array() as $row) {

            $results[$row['usuario_id']] = $row;
        }
        
        return json_encode($results);
    
    }
    
    function get_user($nombre_usuario){
        
        $this->db->like('nombre_usuario', $nombre_usuario);
        
        $this->db->select('usuario_id, nombre_usuario');
        
        $consulta = $this->db->get('usuarios');
        
        if($consulta->num_rows() > 0){
            
            foreach ($consulta->result_array() as $row) {

               $results[$row['usuario_id']] = $row;
            
            }
        
        } else {
            
            $results = 'UPS! El usuario que buscaste no existe.';
            
        }
        
            return json_encode($results);
            
    }
    
    public function auntenticar($usr, $passwd){
        
        $sql = 'SELECT usuario_id FROM usuarios WHERE nombre_usuario = ? AND passwd = ? ';
        
        $consulta = $this->db->query($sql, array($usr, md5($passwd)));
        
        if ($consulta->num_rows() == 0) {
            
            $logged = array('mensaje' => 'ok');
            
            //echo 'You\'r not logged';
                
        } else {
            
            $logged = array('mensaje' => 'vacio');;
            
            //echo 'You\'r logged';
            
        }
        
        return $logged;
        
    }
    
    public function registrar_usuario($usr, $passwd){
        
        $sql = 'SELECT nombre_usuario FROM usuarios WHERE nombre_usuario = ?';
        
        $consulta = $this->db->query($sql, array($usr));
        
        if($consulta->num_rows() > 0){
            
            $registrado = 0;
            
        } else {
            
            $sql = 'INSERT INTO usuarios (nombre_usuario, passwd) VALUES (?, ?)';
            
            $consulta = $this->db->query($sql, array($usr, md5($passwd)));
            
            $registrado = 1;
            
        }
        
        return $registrado;
        
    }

}
?>
