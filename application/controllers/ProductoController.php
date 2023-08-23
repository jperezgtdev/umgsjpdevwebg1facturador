
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class ProductoController extends CI_Controller{
    
 
function __construct()
	{
		parent::__construct();
		$this->load->model('ProductoModel');
	}

    public function index(){
		$resultados = $this->ProductoModel->getProductoData();
		$this->data['resultados'] = $resultados;
		$this->data['titulo'] = "Nuevo titulo";
		$this->load->view('Producto_view', $this->data);
	}


    function insertar(){
        $data = array(
            'id_producto' => $this->input->post('id_producto'),
            'fk_categoria' => $this->input->post('fk_categoria'),
            'nombre' => $this->input->post('nombre'),
            'costo' => $this->input->post('costo'),
            'unidades' => $this->input->post('unidades'),
            'estado' => $this->input->post('estado'),
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'usuario_creacion' => 'admon'
        );
        
        $this->ProductoModel->insertarProducto($data);
        redirect('ProductoController/index');
    }


    function guardarEdicion(){
        $data = array(
            'id_producto' => $this->input->post('edit_id_producto'),
            'fk_categoria' => $this->input->post('edit_fk_categoria'),
            'nombre' => $this->input->post('edit_nombre'),
            'costo' => $this->input->post('edit_costo')  ,  
            'unidades' => $this->input->post('edit_unidades')  ,  
            'estado' => $this->input->post('edit_estado')  ,
            'fecha_mod' => date('Y-m-d H:i:s'),
            'usuario_mod' => 'admon'
        );

        $id = $this-> input->post('id_producto');
        $this->ProductoModel->modificarProducto($data,$id);
        redirect('ProductoController/index');
    }

    function eliminarProducto(){
        $data=array(
            'estado'=>0
        );
        $id = $this-> input->post('mEliminar');
        $this->ProductoModel->eliminarProducto($id,$data);
        redirect('ProductoController/index');
    }
}