<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductoController extends CI_Controller{

    function __construct()
	{
		parent::__construct();
	//	$this->load->model('ProductoModel');
	}

    public function index(){
	/*	$resultados = $this->ProductoModel->getAllClient();
		$this->data['resultados'] = $resultados;
		$this->data['titulo'] = "Nuevo titulo";*/
    $this->load->view('Producto_view'/*, $this->data*/);
	}

/*    function insertar(){
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'dpi' => $this->input->post('dpi'),
            'telefono' => $this->input->post('telefono'),
            'direccion' => $this->input->post('direccion'),
            'nit' => $this->input->post('nit'),
            'estado' => $this->input->post('estado')
        );
        
        $this->ProductoModel->insertarCliente($data);
        redirect('ProductoController/index');
    }

    function guardarEdicion(){
        $data = array(
            'nombre' => $this->input->post('edit_nombre'),
            'dpi' => $this->input->post('edit_dpi'),
            'telefono' => $this->input->post('edit_telefono'),
            'direccion' => $this->input->post('edit_direccion'),
            'nit' => $this->input->post('edit_nit'),
            'estado' => $this->input->post('edit_estado')
        );
        print_r("hola mundo");
        $id = $this->input->post('Eid_cliente');
        
        $this->ClienteModel->modificarCliente($data, $id);
        redirect('ProductoController/index');
    }*/
    
}