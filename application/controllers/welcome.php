<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
            
            $this->load->model('usuario/usuario', 'usr', TRUE);
            
            $usr = 'brass3a4';
            
            $passwd = 'hola';
            
            /* @var $data JSON */
            $data = $this->usr->get_users();
            
            
            print_r($data);
            
            //$data = $this->usr->registrar_usuario($usr, $passwd);

            //$this->load->view('welcome_message');
	}
        
        public function autenticar($usr, $passwd){
            
            $usr = 'shannonbit';
            
            $passwd = 'hola';
            
            $data = $this->usr->auntenticar('shannonbit', 'hola');
            
            return $data;
            
        }
        
        public function registrar_usuario($usr, $passwd){
            
            $data = $this->usr->registrar_usuario($usr, $passwd);
            
            return $data;
            
        }
                
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */