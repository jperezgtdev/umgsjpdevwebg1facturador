
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetalleFacturaModel extends CI_Model{

function __construct()
	{
		parent::__construct();
	}

    public function DetalleFacturas() {
        $this->db->select('f.id_factura, c.nombre, f.fecha');
        $this->db->from('factura f');
        $this->db->join('cliente c', 'f.fk_cliente = c.id_cliente');
        $this->db->where('f.estado=1');
        $query = $this->db->get();
        return $query->result();
    }


	public function anularFactura($id,$data) {

		$this->db->where('id_factura', $id);
		$this->db->update('factura', $data);
	
	}
    public function consultaClave(){
        
    }

    public function DetalleCliente($id) {
        $this->db->select('f.id_factura, c.nombre, c.nit');
        $this->db->from('factura AS f');
        $this->db->join('cliente AS c', 'f.fk_cliente = c.id_cliente');
        $this->db->where('f.id_factura', $id);
        $query = $this->db->get();
        return $query->result();

    }
	
}