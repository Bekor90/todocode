<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tareas_controller extends CI_Controller {
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
		$this->load->view('dashboard/menu');		
	}
	public function registrarTareas()
	{
		$tituloform = $this->input->post('titulo', TRUE);
		$descripcionform = $this->input->post('descripcion', TRUE);
		$categoriaform = $this->input->post('categoria', TRUE);
		$mensaje = array('titulo' => '', 'body' => '');
		$id = $this->session->userdata("user_id");

		if($tituloform && $descripcionform &&  $categoriaform){
			$result = $this->Tbl_tarea_Model->saveTarea($tituloform, $descripcionform, $id, $categoriaform);
			if ($result != FALSE){

				//mostrar mensaje exitoso
				//limpiar formulario*/
				$data = array('result' => '', 'error' => true, 'mensaje' => 'No almacenó el registro');
				$user['nombre'] = '';
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/tareas/registrar_tareas', $data);
				$this->load->view('dashboard/cierredashboard');	
			}else{
				$user['nombre'] = '';
				$data = array('result' => '', 'error' => true, 'mensaje' => 'Registro almacenado satisfactoriamente');
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/tareas/registrar_tareas', $data);
				$this->load->view('dashboard/cierredashboard');
			}
		}
	}

	public function editarTarea($id)
	{	
		$data = array('result' => '');
		if($id >= 0){
			$result = $this->Tbl_tarea_Model->findByTarea($id);
			$data['result'] = $result;
			$data = array('result' => $result, 
				      'error' => false, 
				      'mensaje' => '',
			              'class' => 'alert alert-danger');
			$user['nombre'] = '';
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/tareas/editar_tarea', $data);
				$this->load->view('dashboard/cierredashboard');	
		}else{
			$data = array('result' => '', 
				      'error' => true, 
				      'mensaje' => 'Se editó satisfactoriamente',
			              'class' => 'alert alert-success');
			$user['nombre'] = '';
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/tareas/editar_tarea', $data);
				$this->load->view('dashboard/cierredashboard');	
		}	

	}
	public function actualizar()
	{
		$id =  $this->input->post('id', TRUE);
		$tituloform = $this->input->post('edititulo', TRUE);
		$descripcionform = $this->input->post('editdescrip', TRUE);
		$id_usuario = $this->input->post('idusuario', TRUE);
		$categoriaform = $this->input->post('categoria', TRUE);

		$data = array('id_tarea' =>$id,
					'titulo' => $tituloform,
					'descripcion' => $descripcionform,
					'id_usuario' => $id_usuario,
					'estado' => 'a',
					'id_categoriat' => $categoriaform,);


		if($id && $tituloform && $descripcionform && $id_usuario  && $categoriaform){
			$result = $this->Tbl_tarea_Model->updateTarea($data, $id);
			if ($result != FALSE){

				//mostrar mensaje exitoso
				//limpiar formulario*/
				$user['nombre'] = '';
				$data = array('result' => '', 
					      'error' => true, 
						  'mensaje' => 'Registro editado satisfactoriamente',
					      'class' => 'alert alert-succes');
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/tareas/editar_tarea', $data);
				$this->load->view('dashboard/cierredashboard');
			}else{
				$user['nombre'] = '';
				$data = array('result' => '', 
					      'error' => true, 
					      'mensaje' => 'Error, no se editó el usuario',
					      'class' => 'alert alert-danger');
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/tareas/editar_tarea', $data);
				$this->load->view('dashboard/cierredashboard');
			}
		}	
	}

	public function eliminarTarea($id)
	{		
		if($id >= 0){
			$result = $this->Tbl_tarea_Model->deleteTarea($id);
			if ($result != FALSE){
		
				redirect('Dashboard/tareas');
				$user['nombre'] = '';
				$data = array('result' => '', 
					      'error' => true, 
					      'mensaje' => 'Error! No se logró eliminar la tarea.',
					      'class' => 'alert alert-danger');				
				$user['nombre'] = '';
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/tareas/registrar_tareas', $data);
				$this->load->view('dashboard/cierredashboard');	
			}else{				
				$data = array('result' => '', 
					      'error' => true, 
					      'mensaje' => 'Registro eliminado satisfactoriamente.',
					      'class' => 'alert alert-success');
				$user['nombre'] = '';
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/tareas/registrar_tareas', $data);
				$this->load->view('dashboard/cierredashboard');
			}
		}

	}

}
