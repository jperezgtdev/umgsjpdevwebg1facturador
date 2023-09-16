
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductoModel extends CI_Model{




function __construct()
	{
		parent::__construct();
	}

    public function getProductoData (){
		$this->db->select('producto.id_producto,categorias.nombre as nombre_categoria,producto.nombre,producto.costo,producto.unidades,producto.estado');
		$this->db->from('producto');
		$this->db->join('categorias', 'producto.fk_categoria = categorias.id_categoria');
        $this->db->where('producto.estado','1');
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

	public function get_categorias() {
		$this->db->select('*');
		$this->db->from('categorias');
        $query = $this->db->get();
        return $query->result();
    }
	
	

}