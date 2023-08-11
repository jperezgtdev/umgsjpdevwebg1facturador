<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClienteModel extends CI_Model{

    function __construct()
	{
		parent::__construct();
	}

    public function getAllClient(){
		$this->db->select('id_cliente,nombre,dpi,telefono,direccion,nit,estado');
		$this->db->from('cliente');
        $this->db->where('estado','1');
		$query = $this->db->get();
		return $query->result();
	}

    public function insertarCliente($data){
        $this->db->insert('cliente',$data);
    }

    public function getClientePorId($id) {
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->where('id_cliente', $id);
        $query = $this->db->get('cliente'); // 'clientes' es el nombre de tu tabla de clientes

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null; // Cliente no encontrado
        }
    }

    public function modificarCliente($data, $id) {
		
		$this->db->update('cliente', $data);
        $this->db->where('id_cliente', $id);
	}

}