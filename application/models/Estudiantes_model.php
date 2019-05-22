<?php 
	/**
	 * Autor: Carlos Hernández Montellano
	 *
	 * Descripción: Controlador para el CRUD de estudiantes.
	 *
	 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiantes_model extends CI_model {
	function __construct() {
		parent::__construct();

	}

	function insert ($data) {
		$data['password'] = hash('sha256', $data['matricula']);
		$status = -1; //Error desconocido.

		$query = $this->db->get_where('estudiantes', array('matricula' => $data['matricula']));
		$exists = $query->num_rows();
		$query->free_result();

		if(!$exists) {
			$this->db->insert('estudiantes', $data);
			$status = 0; //Insert realizado con éxito
		} else
			$status = 1; //Existe un registro con la misma matrícula.

		return $status;
	}

	function queryAll() {
		return $this->db->get('estudiantes');
	}

	function queryByMatricula($matricula) {
		return $this->db->get_where('estudiantes', array('matricula' => $matricula))->row();
	}

	function update($data) {
		$estudiante = $this->db->get_where('estudiantes', array('matricula' => $data['matricula']))->row();
		$this->db->where('matricula', $data['matricula']);
		$this->db->update('estudiantes', $data);
		return 0;
	}
}

?>