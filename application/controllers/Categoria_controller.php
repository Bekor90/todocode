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
				$mensaje = array('titulo' => 'Categoria', 'body' => 'Registro satisfactorio');
				//redirect('Dashboard');
				$this->load->view('dashboard/menu');
				$this->load->view('dashboard/categorias/registrar_categoria');
				$this->load->view('errors/perzonalizado/mensajes', $mensaje);
				$this->load->view('dashboard/cierredashboard');
			}
		}
	}

	public function editarCategoria($id)
	{	
		$data = array('result' => '');
		if($id >= 0){
			$result = $this->Tbl_categoria_Model->findByCategoria($id);
			$data['result'] = $result;
				$this->load->view('dashboard/menu');
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
				$mensaje = array('titulo' => 'Usuario', 'body' => 'Registro satisfactorio');
				redirect('Dashboard');
			}
		}	
	}

	public function eliminarCategoria($id)
	{		
		if($id >= 0){
			$result = $this->Tbl_categoria_Model->deleteCategoria($id);
			if ($result != FALSE){
		
				redirect('Dashboard');
			}
		}

	}

}
