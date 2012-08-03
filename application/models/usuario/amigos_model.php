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
            
            $results['mensaje'] = 'ok';
            
        } else {
            
            $results['mensaje'] = 'vacio';
            
        }
        
        return $results;
        
    }
    
    public function peticiones_amigos($usr_id){
        
        $this->db->select('remitente_usr_id, estado');
        
        $this->db->from('peticiones_amigos');
        
        $this->db->where(array('destinatario_usr_id' => $usr_id, 'estado' => 0));
        
        $consulta = $this->db->get();
        
        if($consulta->num_rows() != 0){
            
            foreach ($consulta->result_array() as $row) {

                $results[] = $row;
                
            }
            
            $results['mensaje'] = 'ok';
            
        } else {
            
            $results['mensaje'] = 'vacio';
            
        }
        
        return $results;
        
    }
    
    public function peticiones_leidas($destinatario_usr_id, $remitente_usr_id){
            
            $data = array('estado' => 1);

            $this->db->where(array('remitente_usr_id' => $remitente_usr_id, 'destinatario_usr_id' => $destinatario_usr_id));
           
            $this->db->update('peticiones_amigos', $data);
            
        }
        
        public function agregar_amigo($usuario_id, $remitente_usr_id){
            
            $data = array(
                'usr_id_1' => $usuario_id,
                'usr_id_2' => $remitente_usr_id ,
                'estado' => 1
            );

            $this->db->insert('amigos', $data);
            
        }


        public function hacer_peticion($destinatario_usr_id, $remitente_usr_id){
        
        $data = array(
            'remitente_usr_id' => $remitente_usr_id ,
            'destinatario_usr_id' => $destinatario_usr_id ,
            'estado' => '0'
        );

        $this->db->insert('peticiones_amigos', $data); 
        
    }

}

?>