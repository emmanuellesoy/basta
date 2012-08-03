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
        
        public function autenticar(){
            
            $usr = $this->input->get('usuario');
            
            $passwd = $this->input->get('contrasena');
            
            $this->load->model('usuario/usuario', 'usr', TRUE);
            
            $data = $this->usr->auntenticar($usr, $passwd);
            
            if(isset($_GET['callback'])){ // Si es una petición cross-domain
                
                echo $_GET['callback'].'('.json_encode($data).')';
            } else {
                
                echo json_encode($data);
                
            }
           
            echo json_encode($data);
            
        }
        
        public function registrar_usuario($usr, $passwd){
            
            $this->load->model('usuario/usuario', 'usr', TRUE);
            
            $data = $this->usr->registrar_usuario($usr, $passwd);
            
            print_r($data);
            
        }
        
        public function buscar_usuario($nombre_usuario){
            
            $this->load->model('usuario/usuario', 'usr', TRUE);
            
            $data = $this->usr->get_user($nombre_usuario);
            
            print_r($data);
            
        }
                
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */