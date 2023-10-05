

    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class usuario extends CI_Controller{
    
 
function __construct()
	{
		parent::__construct();
		$this->load->model('usuarioModel');
	}

    public function index(){
        if(!$this->session->userdata('logged_in')){
            redirect('controlador_login/index');
        }else{
            $roles = $this->usuarioModel->get_roles();
            $this->data['roles'] = $roles;
            $resultados = $this->usuarioModel->getUsuarioData();
            $this->data['resultados'] = $resultados;
            $this->data['titulo'] = "Nuevo titulo";
            $this->load->view('V_usuario', $this->data);
        }
	}

    function insertar(){
        $password= $this->input->post('pass');
        $decod = base64_decode($password);

        $data = array(
            'usuario' => $this->input->post('usuario'),
            'correo' => $this->input->post('correo'),
            'pass' => sha1($decod), 
            'nombre' => $this->input->post('nombre'),
            'telefono' => $this->input->post('telefono')  ,  
            'fk_rol' => $this->input->post('fk_rol')  ,  
            'estado' => $this->input->post('estado') ,  
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'usuario_creacion' => $this->session->userdata('usuario')
        );
    
        $this->usuarioModel->insertarUsuario($data);
        redirect('usuario/index');
    }

    function guardarEdicion(){
        $data = array(
            'usuario' => $this->input->post('edit_usuario'),
            'correo' => $this->input->post('edit_correo'),
            'nombre' => $this->input->post('edit_nombre'),
            'telefono' => $this->input->post('edit_telefono')  ,  
            'fk_rol' => $this->input->post('edit_fk_rol')  ,  
            'estado' => $this->input->post('edit_estado')  ,
            'fecha_mod' => date('Y-m-d H:i:s'),
            'usuario_mod' => $this->session->userdata('usuario')
        );

        $id = $this-> input->post('id_usuario');
        $this->usuarioModel->modificarUsuario($data,$id);
        redirect('usuario/index');
    }

    function eliminarUsuario(){
        $data=array(
            'estado'=>0
        );
        $id = $this-> input->post('mEliminar');
        $this->usuarioModel->eliminarUsuario($id,$data);
        redirect('usuario/index');
    }
}