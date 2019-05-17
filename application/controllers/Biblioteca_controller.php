<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biblioteca_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		
	}

	public function index()
	{
		if ($this->input->post("guardar")) 
		{
			$empleados =array(
				'id_empleado' => $this->input->post('id_empleado'),
				'nombre' => $this->input->post('nombre'),
				'apellidos' => $this->input->post('apellidos'),
				'rol' => $this->input->post('rol'),
				'email' => $this->input->post('email')
			);

			$this->db->insert('empleados',$empleados);

		}
		$this->load->view('view_empleados');
	}
}
