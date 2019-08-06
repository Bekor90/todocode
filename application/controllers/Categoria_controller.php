<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categoria_controller extends CI_Controller {
	/**
	 **Cargar por defecto la vista del login 
	 */

	public function __construct()
    {
        parent::__construct(); 
        $this->load->helper('helpers_helper');       
        $this->load->model('Tbl_usuarios_Model');
        $this->load->model('Tbl_tarea_Model');
        $this->load->model('Tbl_categoria_Model');
          if(!$this->session->userdata('log')){
        	redirect('Home');
        }
    }

	public function index()
	{
		$this->load->view('dashboard/menu');		
	}
	public function registrarCategoria()
	{
		$tituloform = $this->input->post('titulo', TRUE);
		$descripcionform = $this->input->post('descripcion', TRUE);

		if($tituloform && $descripcionform){
			$result = $this->Tbl_categoria_Model->saveCategoria($tituloform, $descripcionform);
			if ($result != FALSE){
				//mostrar mensaje exitoso
				//limpiar formulario*/
				$data = array('result' => '', 'error' => true, 
				'mensaje' => 'No almacenó el registro',
				'class' => 'alert alert-danger');
			
				$user['nombre'] = '';
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/categorias/registrar_categoria', $data);
				$this->load->view('dashboard/cierredashboard');	
			}else{
				$user['nombre'] = '';
				$data = array('result' => '', 'error' => true, 
				'mensaje' => 'Registro almacenado satisfactoriamente',
				'class' => 'alert alert-success');
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/categorias/registrar_categoria', $data);
				$this->load->view('dashboard/cierredashboard');
			}
		}
	}
	
	public function editarCategoria($id)
	{	
		$data = array('result' => '');
		if($id >= 0){
			$result = $this->Tbl_categoria_Model->findByCategoria($id);
			$data = array('result' => $result, 
				      'error' => true, 
				      'mensaje' => 'Se edito satisfactoriamente',
			          'class' => 'alert alert-success');
				$user['nombre'] = '';
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/categorias/editar_categoria', $data);
				$this->load->view('dashboard/cierredashboard');	
		}else{
			$data = array('result' => '', 
				      'error' => true, 
				      'mensaje' => 'Se edito satisfactoriamente',
			          'class' => 'alert alert-success');
			$user['nombre'] = '';
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/categorias/editar_categoria', $data);
				$this->load->view('dashboard/cierredashboard');	
		}	

	}
	public function actualizar()
	{
		$id =  $this->input->post('id', TRUE);
		$nombreform = $this->input->post('editnombre', TRUE);
		$descripcionform = $this->input->post('editdescrip', TRUE);

		$data = array('id_categoria' =>$id,
					'nombre' => $nombreform,
					'descripcion' => $descripcionform);


		if($id && $nombreform && $descripcionform){
			$result = $this->Tbl_categoria_Model->updateCategoria($data, $id);
			if ($result != FALSE){

				//mostrar mensaje exitoso
				//limpiar formulario*/
				$user['nombre'] = '';
				$data = array('result' => '', 
					      'error' => true, 
						  'mensaje' => 'Registro editado satisfactoriamente',
					      'class' => 'alert alert-success');
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/categorias/registrar_categoria', $data);
				$this->load->view('dashboard/cierredashboard');
			}else{
				$user['nombre'] = '';
				$data = array('result' => '', 
					      'error' => true, 
						  'mensaje' => 'Error, no se editó el usuario',
					      'class' => 'alert alert-danger');
				$this->load->view('dashboard/menu', $user);
				$this->load->view('dashboard/categorias/registrar_categoria', $data);
				$this->load->view('dashboard/cierredashboard');
			}
		}	
	}

	public function eliminarCategoria($id)
	{		
		if($id >= 0){
			$tareas = $this->Tbl_tarea_Model->findTareasCategoria($id);
			if($tareas ){
				$data = array('result' => '', 
							'error' => true, 
							'mensaje' => 'Error! La categoria se encuentra vinculada a una tarea, eliminela primero.',
							'class' => 'alert alert-danger');
					$user['nombre'] = '';
					$this->load->view('dashboard/menu', $user);
					$this->load->view('dashboard/categorias/registrar_categoria', $data);
					$this->load->view('dashboard/cierredashboard');

			}else{

				$result = $this->Tbl_categoria_Model->deleteCategoria($id);
				if ($result){

					$user['nombre'] = '';
					$data = array('result' => '', 
							'error' => true, 
							'mensaje' => 'Registro eliminado satisfactoriamente.',
							'class' => 'alert alert-success');				
					$user['nombre'] = '';
					$this->load->view('dashboard/menu', $user);
					$this->load->view('dashboard/categorias/registrar_categoria', $data);
					$this->load->view('dashboard/cierredashboard');	
				}else{				
					$user['nombre'] = '';
					$data = array('result' => '', 
							'error' => true, 
							'mensaje' => 'No se logró eliminar el registro',
							'class' => 'alert alert-danger');				
					$user['nombre'] = '';
					$this->load->view('dashboard/menu', $user);
					$this->load->view('dashboard/categorias/registrar_categoria', $data);
					$this->load->view('dashboard/cierredashboard');	
				}
			}
		}

	}

}
