<?php
class Adeudos_Model extends CI_Model{
	/* Definición de atributos */
	public $id_adeudo;
	public $id_libro; 
	public $apellidos;
	public $matricula;
	public $nombre;
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
					'fecha_adeudo'=>$this->input->post('fechaadeudo'),
					'fecha_reposicion'=>NULL,
					'fecha_adeudo'=>$this->input->post('fecha_adeudo')
			);
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

	/*
	*
	* Autor: Manuel Santiago
	* Resumen: Este método verifica a todos aquellos prestamos atrasados para registrar su adeudo correspondiente
	* Este metodo debe ser llamado a traves de un cron job
	*/
	public function registrarAdeudoAutomatico(){
		$this->load->helper('date');
		$this->db->select('matricula_estudiante, id_libro');
        $this->db->from('prestamos');
        $this->db->where("DATEDIFF(NOW(), fecha_devolucion) > 0");

		$results = $this->db->get();
		
		foreach ($results->result() as $result) {
			$this->db->select('*');
	        $this->db->from('adeudos');
	        $this->db->where("matricula_estudiante", $result->matricula_estudiante);
	        $this->db->where("id_libro", $result->id_libro);
	        $r = $this->db->get();
	        //echo $this->db->affected_rows()."-";
	        if ($this->db->affected_rows() == 0) {

				$adeudos=array(
						'matricula_estudiante'=>$result->matricula_estudiante,
						'id_libro'=>$result->id_libro,
						'descripcion'=>"Adeudo por atraso en la entrega",
						'fecha_adeudo'=> now(),
						'fecha_reposicion'=>NULL
				);

				$this->db->insert('adeudos',$adeudos);
			}
		}
	}

	/*
	By moises Veha Hernández 
	Conulta que devuelve los datos de un adeudo buscando por matricula o libro 
	*/
	public function ver_adeudo(string $Radeudo)
	{
		//$this->db->like('matricula_estudiante',$Radeudo);
		//$this->db->or_like('matricula',$Radeudo);
		//$Radeudo=$this->db->get('adeudos');
		return $this->db->query("SELECT * FROM 
(
    SELECT libros.titulo,estudiantes.nombre,adeudos.matricula_estudiante,adeudos.fecha_reposicion
    FROM adeudos
    INNER JOIN estudiantes ON  estudiantes.matricula=adeudos.matricula_estudiante
    INNER JOIN libros ON libros.id_libro=adeudos.id_libro
) as R_adeudo
WHERE R_adeudo.titulo='{$Radeudo}' or  R_adeudo.matricula_estudiante='{$Radeudo}'")->result();
		if ($Radeudo->num_rows()>0) {
			return $Radeudo->result();
		}else{
			return false;
		}
	}
}

