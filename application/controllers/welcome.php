<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
        
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