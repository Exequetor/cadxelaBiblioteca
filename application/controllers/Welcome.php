<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
		parent::__construct();

	}

	function index() {
		$this->load->view('templates/header');
		if($this->session->userdata('rol') == 'empleado')
			$this->load->view('welcome_message');
		else if ($this->session->userdata('rol') == 'estudiante'){
			$this->load->view('estudiantes/welcome');
		}
	}
}
?>
