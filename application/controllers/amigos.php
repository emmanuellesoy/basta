<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Amigos extends CI_Controller {

	public function index(){
            
            $this->load->model(array('usuario/usuario', 'usuario/amigos'));

            $this->load->view('welcome_message');
	}
        
        public function obtener_amigos(){
            
            $usr_id = $this->input->post('id_usuario');
            
            $this->load->model('usuario/amigos_model', 'amg', TRUE);
                
            $data = $this->amg->obtener_amigos($usr_id);
            
            if(isset($_GET['callback'])){
                
                echo $_GET['callback'].'('.json_encode($data).')';
            
            } else {
                
                echo json_encode($data);
                
            }
            
        }
        
        public function peticiones(){
            
            $usr_id = $this->input->post('id_usuario');
            
            $this->load->model('usuario/amigos_model', 'amg', TRUE);
            
            $this->load->model('usuario/usuario', 'usr', TRUE);
            
            $data = $this->amg->peticiones_amigos($usr_id);
            
            if(isset($_GET['callback'])){
                
                echo $_GET['callback'].'('.json_encode($data).')';
            
            } else {
                
                echo json_encode($data);
                
            }
            
        }
        
        public function agregar_amigo(){
            
            $destinatario_usr_id = $this->input->post('id_destinatario');
            
            $remitente_usr_id = $this->input->post('id_remitente');
        
            $this->load->model('usuario/amigos_model', 'amg', TRUE);

            $data = $this->amg->hacer_peticion($destinatario_usr_id, $remitente_usr_id);
            
            if(isset($_GET['callback'])){
                
                echo $_GET['callback'].'('.json_encode($data).')';
            
            } else {
                
                echo json_encode($data);
                
            }

        }
        
        public function peticion_leida(){
            
            $usuario_id = $this->input->post('id_usuario');
            
            $remitente_usr_id = $this->input->post('id_remitente');
            
            $aceptar = $this->input->post('aceptar');
            
            $this->load->model('usuario/amigos_model', 'amg', TRUE);
            
            $data = $this->amg->peticiones_leidas($usuario_id, $remitente_usr_id);
            
            if($aceptar == 1){
                
                $this->amg->agregar_amigo($usuario_id, $remitente_usr_id);
                
            }
            
            if(isset($_GET['callback'])){
                
                echo $_GET['callback'].'('.json_encode($data).')';
            
            } else {
                
                echo json_encode($data);
                
            }
            
        }
                
}

/* End of file welcome.php */
/* Location: ./application/controllers/amigos.php */