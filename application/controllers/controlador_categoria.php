<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class controlador_categoria extends CI_Controller{
    
 
function __construct()
	{
		parent::__construct();
		$this->load->model('Categoria_Model');
	}

    public function index(){
        $data['resultados'] = $this->Categoria_Model->getCategoria();
		$this->load->view('vista_categoria',$data);
	}

    function insertar(){
        $password= $this->input->post('pass');
        $decod = base64_decode($password);

        $data = array(
            'nombre' => $this->input->post('nombre'),
            'estado' => $this->input->post('estado') ,  
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'usuario_creacion' => $this->session->userdata('usuario')
        );
    
        $this->Categoria_Model->insertarCategoria($data);
        redirect('controlador_categoria/index');
    }

    function guardarEdicion(){
        $data = array(
            'nombre' => $this->input->post('edit_nombre'),
            'estado' => $this->input->post('edit_estado'),
            'fecha_mod' => date('Y-m-d H:i:s'),
            'usuario_mod' => $this->session->userdata('usuario')
        );

        $id = $this-> input->post('id_categoria');
        $this->Categoria_Model->modificarCategoria($data,$id);
        redirect('controlador_categoria/index');
    }

    function eliminarCategoria(){
        $data=array(
            'estado'=>0
        );
        $id = $this-> input->post('mEliminar');
        $this->Categoria_Model->eliminarCategoria($id,$data);
        redirect('controlador_categoria/index');
    }
}