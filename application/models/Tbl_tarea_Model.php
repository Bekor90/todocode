<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_tarea_Model extends CI_model {

	/* function autores()
	{
		$query = $this->db->query("SELECT apellido FROM autores");
		return $query->result();
	}*/

	function saveTarea($titulo, $descripcion, $id_usuario, $categoria)
	{	
		$datos = array(
			'titulo' => $titulo,
			'descripcion' => $descripcion,
			'id_usuario' => $id_usuario,
			'estado' => 'a',
			'id_categoriat' => $categoria
			);

		$this->db->insert('tarea', $datos);	
		
	}

	function updateTarea($data, $idTarea)
	{

		$this->db->where('id_tarea', $idTarea);
        return $this->db->update('tarea', $data);	
    }

    function cambioEstadoTarea($idTarea, $estado)
    {
    	$this->db->where('id_tarea', $idTarea);
        return $this->db->update('estado', $estado);	
    }
     function deleteTarea($idTarea)
    {
    	$this->db->where('id_tarea', $idTarea);
        return $this->db->delete('tarea');	
    }

    function findTareas()
	{

		$tareas = $this->db->get("tarea");
		return $tareas->result();
	}

	function findTareasUsuario($idUsuario)
	{

		$this->db->select('id_tarea, titulo, tarea.descripcion, tarea.id_usuario, estado, categoria.nombre');
		$this->db->from('tarea');
		$this->db->join('usuarios', 'usuarios.id_usuario = tarea.id_usuario');
		$this->db->join('categoria', 'categoria.id_categoria = tarea.id_categoriat');
		$this->db->where('usuarios.id_usuario', $idUsuario);

		$tareas = $this->db->get();

		if ($tareas->num_rows()>0) {
			
			return $tareas->result();
		}else{
			return FALSE;
		}
	}

	function findTareasCategoria($id_categoria)
	{

	$this->db->select('id_tarea, titulo, descripcion, tarea.id_usuario, estado, tarea.id_categoriat');
		$this->db->from('tarea');
		$this->db->join('categoria', 'categoria.id_usuario = tarea.id_categoriat');
		$this->db->where('categoria.id_categoria', $id_categoria);

		$tareas = $this->db->get();

		if ($tareas->num_rows()>0) {
			
			return $tareas->result();
		}else{
			return FALSE;
		}
	}

	function findTareasActivas($id_categoria)
	{

	$this->db->select('id_tarea, titulo, descripcion, id_usuario, estado, id_categoriat');
		$this->db->from('tarea');
		$this->db->distinct('estado', 'c');

		$tareas = $this->db->get();

		if ($tareas->num_rows()>0) {
			
			return $tareas->result();
		}else{
			return FALSE;
		}
	}

	function findByTarea($id)
	{
		$this->db->select('*');
		$this->db->from('tarea');
		$this->db->where('id_tarea', $id);
		$tarea = $this->db->get();
		if ($tarea->num_rows()>0) {			
			return $tarea->result();
		}else{
			return FALSE;
		}
	}
}