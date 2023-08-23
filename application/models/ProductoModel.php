
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductoModel extends CI_Model{




function __construct()
	{
		parent::__construct();
	}

    public function getProductoData (){
		$this->db->select('id_producto,fk_categoria,nombre,costo,unidades,estado');
		$this->db->from('producto');
        $this->db->where('estado','1');
    //$this->db->where('estado=1');
		$query = $this->db->get();

		$result = array();
        foreach ($query->result() as $row) {
            $estado = ($row->estado == 1) ? 'Activo' : 'Inactivo';
            $row->estado = $estado;
            $result[] = $row;
        }
    
		return $query->result();
	}



    public function insertarProducto($data){
        $this->db->insert('producto',$data);
    }

	public function modificarProducto($data, $id) {
		$this->db->where('id_producto', $id);
		$this->db->update('producto', $data);
	
	}

	public function eliminarProducto($id,$data) {

		$this->db->where('id_producto', $id);
		$this->db->update('producto', $data);
	
	}
	
}