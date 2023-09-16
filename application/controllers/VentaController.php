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

    public function agregarFac(){
        $idcliente = (int)$this->input->post('idcliente');
        if (is_numeric($idcliente)) {
            // El valor es un número, procede con la inserción en la base de datos
            $data = array(
                'fk_cliente' => $idcliente,
                'fk_usuario' => '26',
                'fk_venta' => '1',
                'fecha' => date('Y-m-d H:i:s'),
                'fecha_creacion' => date('Y-m-d H:i:s'),
                'usuario_creacion' => 'admon',
                'estado' => '1'
            );
            $this->VentaModel->insertarFactura($data);
            redirect('VentaController/index');
        } else {
            // El valor no es un número válido, maneja el error o muestra un mensaje al usuario
            // Por ejemplo, puedes redirigir de nuevo al formulario con un mensaje de error.
            redirect('VentaController/formulario', 'refresh');
        }
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
