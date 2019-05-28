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

	function getAdeudosByMatricula($matricula) {
		$this->db->select('a.id_adeudo, a.id_libro as id_libro, l.titulo as titulo, a.descripcion as descripcion, a.fecha_adeudo as fecha_adeudo, a.fecha_reposicion as fecha_reposicion, a.estado as estado');
		$this->db->from('adeudos as a');
		$this->db->join('libros as l', 'a.id_libro = l.id_libro', 'inner');
		$this->db->where('a.matricula_estudiante', $matricula);
		$query = $this->db->get();
		return $query->result_array();
	}

	function changeAdeudoStatus($idAdeudo) {
		$this->db->select('estado');
		$adeudo = $this->db->get_where('adeudos', array('id_adeudo'=>$idAdeudo))->row();
		$adeudo->estado?$adeudo->estado='0':$adeudo->estado='1';

		$this->db->where('id_adeudo', $idAdeudo);
		$this->db->update('adeudos', $adeudo);
	}
}

?>