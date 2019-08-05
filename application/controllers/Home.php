<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	/**
	 **Cargar por defecto la vista del login 
	 */
	public function index()
	{
		$this->load->view('login');
	}
}