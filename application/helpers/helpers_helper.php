<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');


function getUsuarios()
{
	$ci =& get_instance();
	$query= $ci->db->get('usuarios');
	return $query->result();
}

function getTareas()
{
	$ci =& get_instance();
	$id = $ci->session->userdata("user_id");
	$ci->load->model('Tbl_tarea_Model');
	if($id > 0){

		 $query= $ci->Tbl_tarea_Model->findTareasUsuario($id);		 
		 if($query){	
		 	return $query;
		 }else{
		 	return false;
		 }
	}
	return false;
}

function getCategorias()
{
	$ci =& get_instance();
	$query= $ci->db->get('categoria');
	return $query->result();
}

?>