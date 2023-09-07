
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class DFacturaController extends CI_Controller{
    
 
function __construct()
	{
		parent::__construct();
		$this->load->model('DetalleFacturaModel');
	}

    public function index() {
        $data['facturas'] = $this->DetalleFacturaModel->DetalleFacturas();
        $this->load->view('DetalleFacturaVista', $data);
    }

    public function ver() {
        $data=array(
            'nombre' => $this->input->post('nombre')
        );        
   
        $data['detalle_factura'] = $this->DetalleFacturaModelo->DetalleCliente($id);
        $this->load->view('DetalleFacturaVista', $data);

    }
    
    public function anular() {
        $data=array(
            'estado'=>0
        );
        $id = $this-> input->post('TxtAnular');
        $this->DetalleFacturaModel->anularFactura($id,$data);
        redirect('DFacturaController/index');
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
        
        $this->DetalleFacturaModel->insertarProducto($data);
        redirect('DFacturaController/index');
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
        $this->DetalleFacturaModel->modificarProducto($data,$id);
        redirect('DFacturaController/index');
    }

    function eliminarProducto(){

    }
}
