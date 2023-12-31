
    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarioModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

    public function getUsuarioData(){
		$this->db->select('usuario.id_usuario,usuario.usuario,usuario.correo,usuario.pass,usuario.nombre,usuario.telefono,roles.nombre_rol,usuario.estado');
		$this->db->from('usuario');
		$this->db->join('roles', 'usuario.fk_rol = roles.id_rol');
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

    public function insertarUsuario($data){
        $this->db->insert('usuario',$data);
    }

	public function modificarUsuario($data, $id) {
		$this->db->where('id_usuario', $id);
		$this->db->update('usuario', $data);
	}

	public function eliminarUsuario($id,$data) {
		$this->db->where('id_usuario', $id);
		$this->db->update('usuario', $data);
	}

	public function get_roles() {
		$this->db->select('*');
		$this->db->from('roles');
        $query = $this->db->get();
        return $query->result();
    }
	
}