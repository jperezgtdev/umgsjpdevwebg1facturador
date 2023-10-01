<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentaController extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('VentaModel');
    }

    public function index()
    {   
        $nit = $this->input->post('numNit'); 
        $data['cliente'] = $this->VentaModel->obtenerNombrePorNIT($nit); 
        $data['productos'] = $this->VentaModel->get_productos();
        $data['titulo'] = "Nuevo título";
        $this->load->view('Venta_view', $data);
    }

    public function insertarEncabezado(){
        $idCliente = (int)$this->input->post('opcion');
        $idFactura = $this->input->post('idFac');
        $data = array(
            'id_factura' => $idFactura,
            'fk_cliente' => $idCliente,
            'fecha' => date('Y-m-d H:i:s'),
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'usuario_creacion' => 'admon',
            'estado' => 1
        );
        $this->VentaModel->insertarEncabezadoFac($data);
        redirect('VentaController/index');
    }

    public function insertarDetalle(){
        $idFactura = $this->input->post('factura');
        $idProducto = $this->input->post('producto');
        $precio = $this->input->post('precio');
        $unidades = $this->input->post('cantidad');
        $total = $this->input->post('total');
        $data = array(
            'id_factura' => $idFactura,
            'id_producto' => $idProducto,
            'fecha' => date('Y-m-d H:i:s'),
            'precio' => $precio,
            'unidades' => $unidades,
            'total' => $total
        );
        $this->VentaModel->insetarDetalleFac($data);
        redirect('VentaController/index');
    }

    public function buscarProducto()
    {
        $opcion = $this->input->get('opcion');
        $respuesta = $this->VentaModel->productodata($opcion);

        $response = array(
            'respuesta' => $respuesta
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function buscarCliente()
    {
        $opcion = $this->input->get('opcion');
        $resupuesta =$this->VentaModel->ClienteData($opcion);
        $response = array (
            'respuesta'=>$resupuesta
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
