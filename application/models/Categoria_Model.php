<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_Model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

    public function getCategoria(){
		$this->db->select('id_categoria, nombre, estado');
		$this->db->from('categorias');
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
    public function insertarCategoria($data){
        $this->db->insert('categorias',$data);
    }

	public function modificarCategoria($data, $id) {
		$this->db->where('id_categoria', $id);
		$this->db->update('categorias', $data);
	}

	public function eliminarCategoria($id,$data) {
		$this->db->where('id_categoria', $id);
		$this->db->update('categorias', $data);
	}
	
}