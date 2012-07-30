<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Amigos extends CI_Controller {

	public function index(){
            
            $this->load->model(array('usuario/usuario', 'usuario/amigos'));

            $this->load->view('welcome_message');
	}
        
        public function autenticar_usuario($usr, $passwd){
            
            $this->load->model('usuario/usuario', 'usr', TRUE);
            
            $data = $this->usr->auntenticar($usr, $passwd);
            
            return $data;
            
        }
        
        public function obtener_amigos($usr_id, $usr, $passwd){
            
            $autenticado = $this->autenticar_usuario($usr, $passwd);
            
            if($autenticado == 1){
                
                $this->load->model('usuario/amigos_model', 'amg', TRUE);
                
                $amigos = $this->amg->obtener_amigos($usr_id);
                
            }
            
            echo $amigos;
            
        }
                
}

/* End of file welcome.php */
/* Location: ./application/controllers/amigos.php */