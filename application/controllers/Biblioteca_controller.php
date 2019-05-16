<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biblioteca_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		if ($_POST) 
		{
			$empleados =array();

			$empleados['id_empleado'] =$_POST['id_empleado'];
			$empleados['nombre'] =$_POST['nombre'];
			$empleados['apellidos'] =$_POST['apellidos'];
			$empleados['rol'] =$_POST['rol'];
			$empleados['email'] =$_POST['email'];

		}
		$this->load->view('view_empleados');
	}
}
