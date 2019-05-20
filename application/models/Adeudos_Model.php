<?php
class Adeudos_Model extends CI_Model{
	/* Definición de atributos */
	public $id_adeudo;
<<<<<<< HEAD
	public $id_libro;
	public $matricula;
	public $nombre;
	public $apellidos;
=======
	public $matricula;
	public $nombre;
>>>>>>> 927e8eba1a43217f33717d38f522f7a5f20c49da
	public $titulo;
	public $descripcion;
	public $fecha_adeudo;
	public $fecha_reposicion;
	public $estado;

	/*
	*
	* Autor: Luisa Ivonne
	* Resumen: Constructor de clase vacio
	*/
	public function __construct() {
		parent::__construct();
	}

	/*
	*
	* Autor: Luisa Ivonne
	* Resumen: Este método realiza la búsqueda de todos los adeudos registrados
	* Salida: Un array con la información de los libros registrados en la BD
	*/
	public function obtenerEstudiantes(){
		$result = $this->db->query('SELECT * FROM estudiantes');
		$users = $result->result_array();
		return $users;
	}

	public function obtenerLibrosPrestados(){
		$result=$this->db->query('SELECT * FROM libros,estudiantes,prestamos WHERE prestamos.matricula_estudiante=estudiantes.matricula and prestamos.id_libro=libros.id_libro');
		$libros = $result->result_array();
		return $libros;
	}

	public function insertarAdeudo(){
		if($this->input->post()){
			$adeudos=array(
					'matricula_estudiante'=>$this->input->post('matricula_estudiante'),
					'id_libro'=>$this->input->post('id_libro'),
					'descripcion'=>$this->input->post('descripcion'),
<<<<<<< HEAD
					'fecha_adeudo'=>$this->input->post('fechaadeudo'),
					'fecha_reposicion'=>NULL
			);
			//print_r($adeudos);
=======
					'fecha_adeudo'=>$this->input->post('fecha_adeudo'),
					'fecha_reposicion'=>$this->input->post('fecha_reposicion')
			);

>>>>>>> 927e8eba1a43217f33717d38f522f7a5f20c49da
			$result = $this->db->insert('adeudos',$adeudos);
			if($result)
				return true;
		}
		return false;
	}
	/*
	*
	* Autor: Luisa Ivonne
	* Resumen: Este método realiza la búsqueda de todos los adeudos registrados
	* Salida: Un array con la información de los adeudos registrados en la BD
	*/
	public function obtenerAdeudos(){
		$this->db->select('*');
		$this->db->from('adeudos a');
		$this->db->join('estudiantes e', 'e.matricula = a.matricula_estudiante', 'left');
		$this->db->join('libros l', 'l.id_libro = a.id_libro', 'left');

		$results = $this->db->get();
		
		return $results->result();
	}
}