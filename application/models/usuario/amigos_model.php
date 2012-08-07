<?php

class Amigos_model extends CI_Model {
    
    public function __construct () {
        
         parent::__construct();
         
         $this->load->database();
    
    }
    
    public function obtener_amigos_model($usr_id){
        
        $this->db->select('usr_id_2');
        
        $this->db->from('amigos');
        
        $this->db->where('usr_id_1', $usr_id);
        
        $this->db->where('estado', 1);
        
        $consulta = $this->db->get();
        
        //$results['query'] = $this->db->last_query();
        
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
           
            $consulta = $this->db->update('peticiones_amigos', $data);
            
            //$results['query'] = $this->db->last_query();
            
            if($consulta){
                
                $results['mensaje'] = 'ok'; 
                
            } else {
                
                $results['mensaje'] = 'error'; 
                
            }
            
            return $results;
            
        }
        
        public function agregar_amigo($usuario_id, $remitente_usr_id){
            
            $data = array(
                array('usr_id_1' => $usuario_id, 'usr_id_2' => $remitente_usr_id, 'estado' => 1),
                array('usr_id_2' => $usuario_id, 'usr_id_1' => $remitente_usr_id, 'estado' => 1)
            );

            $consulta = $this->db->insert_batch('amigos', $data);
            
            if($consulta){
                
                $results['mensaje'] = 'ok'; 
                
            } else {
                
                $results['mensaje'] = 'error'; 
                
            }
            
            return $results;
            
        }


        public function hacer_peticion($destinatario_usr_id, $remitente_usr_id){

            $data = array('remitente_usr_id' => $remitente_usr_id, 'destinatario_usr_id' => $destinatario_usr_id, 'estado' => 0);

            $consulta = $this->db->insert('peticiones_amigos', $data);
        
            if($consulta){
                
                $results['mensaje'] = 'ok'; 
                
            } else {
                
                $results['mensaje'] = 'error'; 
                
            }
            
            return $results;
        
    }

}

?>