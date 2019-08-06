<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_controller extends CI_Controller { 
	/**
	 **Cargar por defecto la vista del login 
	 */

	public function __construct()
    {
        parent::__construct();        
        $this->load->model('Tbl_usuarios_Model');
        $this->load->library("session");
    }

	public function index()
	{
		$this->load->view('login');		
	}
	public function ValidarIngreso()
	{
		$emailform = $this->input->post('email', TRUE);
		$passwordform = $this->input->post('password', TRUE);
		//validar si el email y password se enviaron desde el formulario
		if($emailform && $passwordform ){	
		//	$this->load->view('/dashboard/menu');	
			$result = $this->Tbl_usuarios_Model->findEmailUsuario($emailform);
			if ($result != FALSE){
				foreach ($result as $row) {
					$emaildb = $row->email;
					$passworddb = $row->password;
					$nombre = $row->nombres;
				}


				if($emailform == $emaildb  && $passwordform == $passworddb){
					$this->session->set_userdata(array('user_id' => $row->id_usuario, 'nombre' => $nombre, 'log' => TRUE));
					redirect('Dashboard');
					
				}else{
					$data['error'] = true;
					$data['mensaje'] = 'Usuario o password incorrectos';
					$this->load->view('login', $data);
					//redirect('Home');
				}
			}else{
				//echo 'No se encontro usuario';
				redirect('Home');
			}
		}else{
			//echo 'Diligencie todos los datos';
			redirect('Home');
		}					
	}
}
