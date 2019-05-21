<?php
/**
* Autor: Carlos Hernández Montellano
*
* Descripción: Controlador para el CRUD de estudiantes.
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Estudiantes extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Estudiantes_model', 'model');
	}

	public function index () {
		$data['query'] = $this->model->queryAll();
		$this->load->view('templates/header');
		$this->load->view('estudiantes', $data);
	}

	public function insert () {
		$data = array(
			'matricula' => $this->input->post('matricula'),
			'nombre' => $this->input->post('nombre'),
			'apellidos' => $this->input->post('apellidos')
		);

		$status = $this->model->insert($data);
		switch($status) {
			case 0: echo('Insert realizado con éxito'); break;
			case 1: echo('Ya existe un estudiante con esa matrícula'); break;
			case -1: echo('Error desconocido');
		}
		echo('<br><br><a href="'.base_url().'index.php/estudiantes">Volver a la página de estudiantes</a>');
	}
}
?>