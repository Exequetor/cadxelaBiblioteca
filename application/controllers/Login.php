<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Login_model', 'model');
		$this->load->library('utils');
	}

	function index() {
		$this->load->view('login');
	}

	function signin() {
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$data = array(
					'user' => $this->input->post('user'),
					'password' => hash('sha256', $this->input->post('password')),
					'rol' => $this->input->post('rol')
				);
			$response = $this->model->signIn($data);
		}
		if ($response == NULL) {
			$responseData['bad_login'] = 'error';
			$responseData['alert'] = $this->utils->alert_builder('<strong>Error</strong>: la matricula/correo o password es incorrecto', 'danger');
		} else {
			$data['logged_in'] = TRUE;
			//$data['password'] = 'asd';
			$this->session->set_userdata($data);
			$this->session->unset_userdata('password');
			redirect('/welcome', 'refresh');
		}
		$this->load->view('login', $responseData);
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}
}
?>