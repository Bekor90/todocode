<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_usuarios_Model extends CI_model {

	/* function autores()
	{
		$query = $this->db->query("SELECT apellido FROM autores");
		return $query->result();
	}*/

	function saveUsuario($nombre, $apellidos, $email, $password)
	{	
		$datos = array(
			'nombres' => $nombre,
			'apellidos' => $apellidos,
			'email' => $email,
			'password' => $password
			);

		$this->db->insert('usuarios', $datos);	
		
	}

	function updateUsuario($data, $idUsuario)
	{

		$this->db->where('id_usuario', $idUsuario);
        return $this->db->update('usuarios', $data);	
    }

    function deleteUsuario($idUsuario)
    {
    	$this->db->where('id_usuario', $idUsuario);
        return $this->db->delete('usuarios');	
    }

    function findUsuarios()
	{

		$Consulta = $this->db->get("usuarios");
		return $Consulta->result();
	}

	function findByUsuarios($id)
	{

		$this->db->select('id_usuario, nombres, apellidos, email, password');
		$this->db->from('usuarios');
		$this->db->where('id_usuario', $id);
		$usuario = $this->db->get();
		if ($usuario->num_rows()>0) {			
			return $usuario->result();
		}else{
			return FALSE;
		}

	}


	function findEmailUsuario($email)
	{

		$this->db->select('id_usuario, nombres, apellidos, email, password');
		$this->db->from('usuarios');
		$this->db->where('email', $email);
		$usuario = $this->db->get();

		if ($usuario->num_rows()>0) {
			
			return $usuario->result();
		}else{
			return FALSE;
		}

	}
}