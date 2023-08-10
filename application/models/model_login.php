<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_login extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtener_usuario_por_credenciales($usuario, $contraseña) {
        $this->db->where('usuario', $usuario);
        $this->db->where('contraseña', $contraseña);
        $query = $this->db->get('usuario');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

}
