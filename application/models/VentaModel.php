
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentaModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

    public function obtenerNombrePorNIT($nit) {
        $this->db->select('nit, id_cliente, nombre');
        $this->db->from('cliente');
        $this->db->where('nit', $nit);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_productos(){
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('estado=1');
        $query = $this->db->get();
        return $query->result();
    }

    public function productodata($opcion){
        $this->db->select('unidades,costo');
        $this->db->from('producto');
        $this->db->where('id_producto',$opcion);
        $query = $this->db->get();
        return $query->result();
    }

    public function ClienteData($opcion){
        $this->db->select ('id_cliente,nombre,nit');
        $this->db->from('cliente');
        $this->db->where ('nit',$opcion);
        $query=$this->db->get();
        return $query->result();

    }

    public function insertarEncabezadoFac($data){
        $this->db->insert('factura',$data);
    }
    
    public function insetarDetalleFac($data){
        $this->db->insert('detalle_factura',$data);
    }
}