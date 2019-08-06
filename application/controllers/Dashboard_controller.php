<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_controller extends CI_Controller {
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
		$data['nombre'] = $this->session->userdata('nombre');
		$this->load->view('dashboard/menu', $data);		
	}
	public function usuarios()
	{
		$data = array('result' => '', 'error' => false, 'mensaje' => '');
		$this->load->view('dashboard/menu');
		$this->load->view('dashboard/usuarios/registrar_usuario', $data);
		$this->load->view('dashboard/cierredashboard');	
	}
	public function tareas()
	{
		$data = array('result' => '', 'error' => false, 'mensaje' => '');
		$this->load->view('dashboard/menu');
		$this->load->view('dashboard/tareas/registrar_tareas', $data);
		$this->load->view('dashboard/cierredashboard');	
	}
	public function categorias()
	{
		$data = array('result' => '', 'error' => false, 'mensaje' => '');
		$this->load->view('dashboard/menu');
		$this->load->view('dashboard/categorias/registrar_categoria', $data);
		$this->load->view('dashboard/cierredashboard');		
	}

	public function salir()
	{
		$this->session->sess_destroy();
		redirect('Home');
	}
}
