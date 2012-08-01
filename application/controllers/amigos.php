<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Amigos extends CI_Controller {

	public function index(){
            
            $this->load->model(array('usuario/usuario', 'usuario/amigos'));

            $this->load->view('welcome_message');
	}
        
        public function autenticar_usuario(){
            
            $usr = $this->input->post('usuario');
            
            $passwd = $this->input->post('contrasena');
            
            $this->load->model('usuario/usuario', 'usr', TRUE);
            
            $data = $this->usr->auntenticar($usr, $passwd);
            
            return $data;
            
        }
        
        public function obtener_amigos($usr_id){
            
                $this->load->model('usuario/amigos_model', 'amg', TRUE);
                
                $amigos = $this->amg->obtener_amigos($usr_id);
            
            echo $amigos;
            
        }
        
        public function peticiones($usr_id){
            
            $this->load->model('usuario/amigos_model', 'amg', TRUE);
            
            $this->load->model('usuario/usuario', 'usr', TRUE);
            
            $peticiones = $this->amg->peticiones_amigos($usr_id);
            
            print_r($peticiones);
            
        }
        
        public function agregar_amigo($destinatario_usr_id, $remitente_usr_id){
        
            $this->load->model('usuario/amigos_model', 'amg', TRUE);

            $hacer_peticion = $this->amg->hacer_peticion($destinatario_usr_id, $remitente_usr_id);

        }
        
        public function peticion_leida($usuario_id, $remitente_usr_id, $aceptar){
            
            $this->load->model('usuario/amigos_model', 'amg', TRUE);
            
            $this->amg->peticiones_leidas($usuario_id, $remitente_usr_id);
            
            if($aceptar == 1){
                
                $this->amg->agregar_amigo($usuario_id, $remitente_usr_id);
                
            }
            
        }
                
}

/* End of file welcome.php */
/* Location: ./application/controllers/amigos.php */