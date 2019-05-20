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
<<<<<<< HEAD
		$this->db->like('l.titulo', $nombre);
=======
		$this->db->like('titulo', $nombre);
>>>>>>> 927e8eba1a43217f33717d38f522f7a5f20c49da

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return null;
		}	
	}

<<<<<<< HEAD
	/*
	*
	* Autor: Manuel Santiago
	* Resumen: Este método realiza la búsqueda de un libro a través de su id
	* Entrada $id: El id del libro a buscar
	* Salida: El libro encontrado o null en caso de no hayarlo
	*/
	public function buscarLibroXId($id){
		$this->db->select('*');
		$this->db->from('libros l');
		$this->db->join('autores_x_libro al', 'al.id_libro = l.id_libro', 'left');
		$this->db->join('autores a', 'a.id_autor = al.id_autor', 'left');
		$this->db->join('categorias c', 'c.id_categoria = l.id_categoria', 'left');
		$this->db->where('l.id_libro', $id);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return null;
		}	
	}

	/*
	*
	* Autor: Manuel Santiago
	* Resumen: Este método inserta un nuevo libro en la BD
	* Entrada libro: La informacion del libro a guardar
	* Salida: El id del libro guardado o 0 en caso de error
	*/
	public function insertar($libro){

		$result = $this->db->insert('libros',$libro);
		if($result)
			return true;
		else
			return false;
	}

	/*
	*
	* Autor: Manuel Santiago
	* Resumen: Este método inserta un nuevo registro en la relación de autor_x_libro en la BD
	* Entrada autor_x_libro: La informacion del registro a guardar
	* Salida: Un indicador de exito o fracaso en el guardado de los datos
	*/
	public function insertarAutorXLibro($autor_x_libro){
		$result = $this->db->insert('autores_x_libro',$autor_x_libro);
		if($result)
			return true;
		else
			return false;
	}

	/*
	*
	* Autor: Manuel Santiago
	* Resumen: Este método actualiza el estado de un libro en la BD
	* Entrada estado: El estado a establecer
	* Entrada clave: El ide del libro
	* Salida: Un indicador de exito o fracaso en el guardado de los datos
	*/
	public function cambiarEstado($estado, $clave){

		$this->db->set('activo', $estado);
		$this->db->where('id_libro', $clave);
		$result = $this->db->update('libros');
		if($result)
			return true;
		else
			return false;
	}

	/*
	*
	* Autor: Manuel Santiago
	* Resumen: Este método actualiza la informacion de un libro en la BD
	* Entrada libro: La informacion del libro a actualizar
	* Entrada clave: El id del libro
	* Salida: Un indicador de exito o fracaso en el guardado de los datos
	*/
	public function actualizarLibro($libro, $clave){

		$this->db->set('id_autor', 0);
		$this->db->set('id_libro', 0);
		$this->db->where('id_libro', $clave);
		$this->db->update('autores_x_libro'); 
		$this->db->where('id_libro', $clave);
		$result = $this->db->update('libros', $libro);
		if($result)
			return true;
		else
			return false;
	}

=======
>>>>>>> 927e8eba1a43217f33717d38f522f7a5f20c49da
}