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
		$this->load->view('estudiantes/index', $data);
	}

	public function insert () {
		if ($this->input->post('matricula')) {
			$data = array(
				'matricula' => $this->input->post('matricula'),
				'nombre' => $this->input->post('nombre'),
				'apellidos' => $this->input->post('apellidos')
			);

			$status = $this->model->insert($data);
			switch($status) {
				case 0: echo('Insert realizado con éxito<br><br>Por defecto, el password del estudiante es su matrícula');
						break;
				case 1: echo('Ya existe un estudiante con esa matrícula');
						break;
				case -1: echo('Error desconocido');
			}
			echo('<br><br><a href="'.base_url().'index.php/estudiantes">Volver a la página de estudiantes</a>');
		} else
			redirect('/estudiantes', 'refresh');
	}

	public function update() {
		$data['segmento'] = $this->uri->segment(3);
		if($data['segmento']) {
			$this->load->view('templates/header');
			$data['estudiante'] = $this->model->queryByMatricula($data['segmento']);
			$data['adeudos'] = $this->model->getAdeudosByMatricula($data['segmento']);
			$this->load->view('estudiantes/update', $data);
		} else if ($this->input->post('matricula')) {
			$updateData = array(
				'matricula' => $this->input->post('matricula'),
				'nombre' => $this->input->post('nombre'),
				'apellidos' => $this->input->post('apellidos'),
				'activo' => empty($this->input->post('activo'))?'0':'1'
			);


			if(!$this->input->post('password')) {
				$est = $this->model->queryByMatricula($updateData['matricula']);
				$updateData['password'] = $est->password;
			} else
				$updateData['password'] = hash('sha256', $this->input->post('password'));
			$status = $this->model->update($updateData);

			switch($status) {
				case 0: echo('Actualización de registro realizada con éxito');
						break;
				case -1: echo('Error desconocido');
			}
			echo('<br><br><a href="'.base_url().'index.php/estudiantes">Volver a la página de estudiantes</a>');
		} else
			redirect('/estudiantes', 'refresh');
	}
	public function status () {
		$data['id_adeudo'] = $this->uri->segment(3);
		$this->model->changeAdeudoStatus($data['id_adeudo']);
		redirect('/estudiantes', 'refresh');
	}
}
?>