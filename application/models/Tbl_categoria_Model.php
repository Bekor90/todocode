<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_categoria_Model extends CI_model {

	/* function autores()
	{
		$query = $this->db->query("SELECT apellido FROM autores");
		return $query->result();
	}*/

	function saveCategoria($nombre, $descripcion)
	{	
		$datos = array(
			'nombre' => $nombre,
			'descripcion' => $descripcion
			);

		$this->db->insert('categoria', $datos);
		
	}

	function updateCategoria($data, $idcategoria)
	{

		$this->db->where('id_categoria', $idcategoria);
        return $this->db->update('categoria', $data);	
    }

    function cambioestatoCategoria($idcategoria, $estado)
    {
    	$this->db->where('id_categoria', $idcategoria);
        return $this->db->update('estado', $estado);	
    }

    function deleteCategoria($idcategoria)
    {
    	$this->db->where('id_categoria', $idcategoria);
        return $this->db->delete('categoria');	
    }

    function findCategorias()
	{

		$categorias = $this->db->get("categoria");
		return $categorias->result();
	}

	function findByCategoria($id)
	{
		$this->db->select('*');
		$this->db->from('categoria');
		$this->db->where('id_categoria', $id);
		$categoria = $this->db->get();
		if ($categoria->num_rows()>0) {			
			return $categoria->result();
		}else{
			return FALSE;
		}
	}
	
}