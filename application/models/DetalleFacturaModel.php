
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

    public function obtenerEncabezado($id_factura) {
        // Especifica los campos que deseas seleccionar
        $this->db->select('factura.id_factura, cliente.nombre AS nombre_cliente, factura.fecha');
        $this->db->from('factura');
        $this->db->join('cliente', 'factura.fk_cliente = cliente.id_cliente');
        $this->db->where('factura.id_factura', $id_factura);
        $query = $this->db->get();
    
        // Verifica si se encontraron resultados
        if ($query->num_rows() > 0) {
            // Devuelve la primera fila de resultados (debería ser única ya que estás filtrando por id_factura)
            return $query->row();
        } else {
            // Si no se encontraron resultados, devuelve false o puedes manejarlo según tus necesidades
            return false;
        }
    }

    public function obtenerDetalle($id_factura) {
        // Realiza la consulta para obtener los detalles de factura según el id_factura
        $this->db->select('df.id_factura, p.nombre as nombre_producto, df.fecha, df.precio, df.unidades, df.total');
        $this->db->from('detalle_factura as df');
        $this->db->join('producto as p', 'df.id_producto = p.id_producto');
        $this->db->where('df.id_factura', $id_factura);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Devuelve un arreglo vacío si no se encuentran detalles.
        }
    }

    public function getDetalles($id_factura){
        $this->db->select('c.nombre AS nombre_cliente,c.direccion, c.nit AS nit, f.id_factura, f.fecha AS fecha, df.unidades, pr.nombre AS nombre_producto, df.precio', 'f.serie', 'f.autorizacion');
        $this->db->from('detalle_factura df');
        $this->db->join('factura f', 'df.id_factura = f.id_factura');
        $this->db->join('cliente c', 'f.fk_cliente = c.id_cliente');
        $this->db->join('producto pr', 'df.id_producto = pr.id_producto');
        $this->db->where('f.id_factura', $id_factura);
        
        $query = $this->db->get();
        return $query->result();
    }
	
}