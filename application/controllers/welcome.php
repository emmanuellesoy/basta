<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
            
            $this->load->model('usuario/usuario', 'usr', TRUE);
            
            $data = $this->usr->get_users();
            
            if(isset($_GET['callback'])){
                
                echo $_GET['callback'].'('.json_encode($data).')';
            
            } else {
                
                echo json_encode($data);
                
            }
            
	}
        
        public function autenticar(){
            
            $usr = $this->input->post('usuario');
            
            $passwd = $this->input->post('contrasena');
            
            $this->load->model('usuario/usuario', 'usr', TRUE);
            
            $data = $this->usr->auntenticar($usr, $passwd);
            
            if(isset($_GET['callback'])){
                
                echo $_GET['callback'].'('.json_encode($data).')';
            
            } else {
                
                echo json_encode($data);
                
            }
            
        }
        
        public function registrar_usuario(){
            
            $usr = $this->input->post('usuario');
            
            $passwd = $this->input->post('contrasena');
            
            $this->load->model('usuario/usuario', 'usr', TRUE);
            
            $data = $this->usr->registrar_usuario($usr, $passwd);
            
            if(isset($_GET['callback'])){
                
                echo $_GET['callback'].'('.json_encode($data).')';
            
            } else {
                
                echo json_encode($data);
                
            }
            
        }
        
        public function buscar_usuario(){
            
            $nombre_usuario = $this->input->post('nombre_usuario');
            
            $this->load->model('usuario/usuario', 'usr', TRUE);
            
            $data = $this->usr->get_user($nombre_usuario);
            
             if(isset($_GET['callback'])){
                
                echo $_GET['callback'].'('.json_encode($data).')';
            
            } else {
                
                echo json_encode($data);
                
            }
            
        }
                
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */