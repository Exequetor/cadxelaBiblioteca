<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Autor: Manuel Santiago
**/
/**
* Resumen: Esta clase representa el modelo de la clase Libro,
* acá incluímos todos los métodos relacionados con los libros gestionados en la biblioteca
**/

class Libro_model extends CI_Model {
	/* Definición de atributos */
	public $id_libro;
	public $titulo;
	public $id_categoria;
	public $paginas;
	public $activo;

	/*
	*
	* Autor: Manuel Santiago
	* Resumen: Constructor de clase vacio
	*/
	public function __construct() {
		parent::__construct();
	}

	/*
	*
	* Autor: Manuel Santiago
	* Resumen: Este método realiza la búsqueda de todos los libros registrados
	* Salida: Un array con la información de los libros registrados en la BD
	*/
	public function obtenerLibros(){
		$this->db->select('*');
		$this->db->from('libros l');
		$this->db->join('autores_x_libro al', 'al.id_libro = l.id_libro', 'left');
		$this->db->join('autores a', 'a.id_autor = al.id_autor', 'left');
		$this->db->join('categorias c', 'c.id_categoria = l.id_categoria', 'left');

		$results = $this->db->get();
		
		return $results->result();
	}

	/*
	*
	* Autor: Manuel Santiago
	* Resumen: Este método realiza la búsqueda de un libro a través de la coincidencia del nombre enviado
	* Entrada $nombre: El nombre del libro a buscar
	* Salida: El libro encontrado o null en caso de no hayarlo
	*/
	public function buscarLibroPorNombre($nombre){
		
		$this->db->select('*');
		$this->db->from('libros l');
		$this->db->join('autores_x_libro al', 'al.id_libro = l.id_libro', 'left');
		$this->db->join('autores a', 'a.id_autor = al.id_autor', 'left');
		$this->db->join('categorias c', 'c.id_categoria = l.id_categoria', 'left');
		$this->db->like('titulo', $nombre);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return null;
		}	
	}

}