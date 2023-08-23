<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controlador_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('model_login'); // Cargamos el modelo Usuario_model
    }

    public function index() {
        // Mostrar el formulario de inicio de sesión
        $this->load->view('login');
    }

    public function login() {
        // Obtener los datos enviados desde el formulario
        $usuario = $this->input->post('usuario');
        $contraseña = $this->input->post('contraseña');
        $contraDecodificada = base64_decode($contraseña);
        $encriptarClave = sha1($contraDecodificada);

        // Consultar la base de datos para verificar las credenciales del usuario
        $user_data = $this->model_login->obtener_usuario_por_credenciales($usuario, $encriptarClave);

        if ($user_data) {
            // Si el usuario existe, almacenar la información del usuario en la sesión
            $this->session->set_userdata('id_usuario', $user_data->id);
            $this->session->set_userdata('nombre', $user_data->usuario);

            // Redirigir a la página de inicio después del inicio de sesión exitoso
            redirect('usuario');
        } else {
            // Si las credenciales son incorrectas, mostrar un mensaje de error
            $data['error_message'] = 'Credenciales inválidas. Inténtalo de nuevo.';
            $this->load->view('login', $data);
        }
    }

    public function logout() {
        // Cerrar sesión y redirigir al formulario de inicio de sesión
        $this->session->sess_destroy();
        redirect('controlador_login');
    }

}
