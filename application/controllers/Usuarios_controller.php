<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios_controller extends CI_Controller {
	/**
	 **Cargar por defecto la vista del login 
	 */

	public function __construct()
    {
        parent::__construct(); 
        $this->load->helper('helpers_helper');       
        $this->load->model('Tbl_usuarios_Model');
        $this->load->model('Tbl_tarea_Model');
          if(!$this->session->userdata('log')){
        	redirect('Home');
        }
    }

	public function index()
	{
		$datos = array('datos' => '');
		$result = array('datos' => '');
		$this->load->view('dashboard/menu');		
	}
	public function registrarUsuarios()
	{
		$emailform = $this->input->post('email', TRUE);
		$passwordform = $this->input->post('password', TRUE);
		$veri_passform = $this->input->post('veri_pass', TRUE);
		$nombreform = $this->input->post('nombre', TRUE);
		$apellidosform = $this->input->post('apellidos', TRUE);
		$mensaje = array('titulo' => '', 'body' => '');

		if($emailform && $passwordform &&  $veri_passform && $nombreform && $apellidosform){
			$result = $this->Tbl_usuarios_Model->saveUsuario($nombreform, $apellidosform, $emailform, $passwordform);
			if ($result != FALSE){

				//mostrar mensaje exitoso
				//limpiar formulario*/
				$user['nombre'] = '';
				$data = array('result' => '', 
					      'error' => true, 
					      'mensaje' => 'Registro almacenado satisfactoriamente',
					      'class' => 'alert alert-danger');
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/usuarios/registrar_usuario', $data);
				$this->load->view('dashboard/cierredashboard');	
			}else{
				$user['nombre'] = '';
				$data = array('result' => '', 
					      'error' => true, 
					      'mensaje' => 'Registro almacenado satisfactoriamente',
					      'class' => 'alert alert-success');
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/usuarios/registrar_usuario', $data);
				$this->load->view('dashboard/cierredashboard');
			}
		}
	}

	public function editarUsuarios($id)
	{	
		$data = array('result' => '');
		if($id > 0){
			$result = $this->Tbl_usuarios_Model->findByUsuarios($id);
			$data['result'] = $result;
			$data = array('result' => $result, 
				      'error' => false, 
				      'mensaje' => '',
			              'class' => 'alert alert-danger');
			$user['nombre'] = '';
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/usuarios/editar_usuario', $data);
				$this->load->view('dashboard/cierredashboard');	
		}else{
			$data = array('result' => '', 
				      'error' => true, 
				      'mensaje' => 'Se edito satisfactoriamente',
			          'class' => 'alert alert-success');
			$user['nombre'] = '';
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/usuarios/editar_usuario', $data);
				$this->load->view('dashboard/cierredashboard');	
		}	

	}
	public function editar()
	{
		$id =  $this->input->post('id', TRUE);
		$passwordform = $this->input->post('editpassword', TRUE);
		$nombreform = $this->input->post('editnombre', TRUE);
		$apellidosform = $this->input->post('editapellidos', TRUE);

		$data = array('id_usuario' =>$id,
					'nombres' => $nombreform,
					'apellidos' => $apellidosform,
					'password' => $passwordform);


		if($id && $passwordform && $nombreform && $apellidosform){
			$result = $this->Tbl_usuarios_Model->updateUsuario($data, $id);
			if ($result != FALSE){

				//mostrar mensaje exitoso
				//limpiar formulario*/
				$user['nombre'] = '';
				$data = array('result' => '', 
					      'error' => true, 
					      'mensaje' => 'Registro editado satisfactoriamente',
					      'class' => 'alert alert-success');
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/usuarios/registrar_usuario', $data);
				$this->load->view('dashboard/cierredashboard');
			}else{
				$user['nombre'] = '';
				$data = array('result' => '', 
					      'error' => true, 
					      'mensaje' => 'Error, no se editó el usuario',
					      'class' => 'alert alert-danger');
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/usuarios/registrar_usuario', $data);
				$this->load->view('dashboard/cierredashboard');
			}
		}
	}

	public function eliminarUsuario($id)
	{		
		if($id >= 0){
			$result = $this->Tbl_usuarios_Model->deleteUsuario($id);
			if ($result){

				$user['nombre'] = '';
				$data = array('result' => '', 
						'error' => true, 
						'mensaje' => 'Registro eliminado satisfactoriamente.',
						'class' => 'alert alert-success');				
				$user['nombre'] = '';
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/usuarios/registrar_usuario', $data);
				$this->load->view('dashboard/cierredashboard');	
			}else{				
				$user['nombre'] = '';
				$data = array('result' => '', 
						'error' => true, 
						'mensaje' => 'No se logró eliminar el registro',
						'class' => 'alert alert-danger');				
				$user['nombre'] = '';
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/usuarios/registrar_usuario', $data);
				$this->load->view('dashboard/cierredashboard');	
			}
		}

	}

}
