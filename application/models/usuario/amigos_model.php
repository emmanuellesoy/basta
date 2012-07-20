<?php

class Amigos_model extends CI_Model {
    
    public function __construct () {
        
         parent::__construct();
         
         $this->load->database();
    
    }
    
    public function obtener_amigos($usr_id){
        
        $sql = 'SELECT usr_id_1, usr_id_2 FROM amigos WHERE (usr_id_1 = ? OR usr_id_2 = ?) AND estado = ?';
        
        $consulta = $this->db->query($sql, array($usr_id, $usr_id, 1));
        
        if($consulta->num_rows() > 0){
            
            foreach ($consulta->result_array() as $row) {

                $results[] = $row;
                
            }
            
        } else {
            
            $results = 0;
            
        }
        
        return json_encode($results);
        
    }

}

?>