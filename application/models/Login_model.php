<?php
/**
	 * Autor: Carlos Hernández Montellano
	 *
	 * Descripción: Controlador del login.
	 *
	 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_model {
	function __construct() {
		parent::__construct();
	}

	function signIn ($data) {
		if($data['rol'] == 'estudiante') {
			$query = $this->db->get_where('estudiantes', array('matricula' => $data['user'], 'password' => $data['password']));
			if(!empty($query->result())) {
				return $data['user'];
			}

		} else if($data['rol'] == 'empleado') {
			$query = $this->db->get_where('empleados', array('email' => $data['user'], 'password' => $data['password']));
			if(!empty($query->result())) {
				return $data['user'];
			}
		}

		return NULL;
	}
}
?>