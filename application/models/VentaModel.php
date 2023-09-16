
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentaModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
// En tu modelo VentaModel.php
/*public function obtenerNombrePorNIT($nit) {
    // Realiza la lógica para buscar el cliente por NIT aquí
    $this->db->select('nit, id_cliente, nombre');
    $this->db->from('cliente');
    $this->db->where('nit', $nit);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row(); // Devuelve el objeto cliente encontrado
    } else {
        return null; // Devuelve null si no se encuentra ningún cliente
    }
}*/

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

    public function insertarFactura($data){
        $this->db->insert('factura',$data);
    }

    public function ClienteData($opcion){
        $this->db->select ('id_cliente,nombre,nit');
        $this->db->from('cliente');
        $this->db->where ('nit',$opcion);
        $query=$this->db->get();
        return $query->result();

    }
}