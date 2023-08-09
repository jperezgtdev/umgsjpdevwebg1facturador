

    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class usuario extends CI_Controller{
    
 
function __construct()
	{
		parent::__construct();
		$this->load->model('usuarioModel');
	}

    public function index(){
		$resultados = $this->usuarioModel->getUsuarioData();
		$this->data['resultados'] = $resultados;
		$this->data['titulo'] = "Nuevo titulo";
		$this->load->view('V_usuario', $this->data);
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
            'estado' => $this->input->post('edit_estado')  
            
            
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

/*	public function client(){

		$password 	= $this->input->post('pass');
		$decod = base64_decode($password);
		$resultados = $this->usuarioModel->insertarUsuario( sha1($decod));
	}*/

}