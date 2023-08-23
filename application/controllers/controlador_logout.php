<?php
defined('BASEPATH') OR exit('No direct script acces allowed');

class controlador_logout extends CI_Controller {

    public function logout() {
        $this->session->unset_userdata('id_usuario');
        $this->session->sess_destroy();
        
        $this->input->set_cookie('token', '', time() - 3600);
        redirect('controlador_login');
    }
}