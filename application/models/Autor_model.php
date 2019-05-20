<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Autor: Manuel Santiago
**/
/**
* Resumen: Esta clase representa el modelo de la clase Libro,
* acá incluímos todos los métodos relacionados con los libros gestionados en la biblioteca
**/

class Autor_model extends CI_Model {
	/* Definición de atributos */
	public $id_autor;
	public $nombre;
	public $apellidos;

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
	* Resumen: Este método realiza la búsqueda de todos los autores registrados
	* Salida: Un array con la información de los autores registrados en la BD
	*/
	public function obtenerAutores(){

		$results = $this->db->get('autores');
		
		return $results->result();
	}

	/*
	*
	* Autor: Manuel Santiago
	* Resumen: Este método inserta un nuevo autor en la BD
	* Entrada autor: La informacion del autor a guardar
	* Salida: Un indicador de verdadero o falso segun corresponda el exito de la operacion
	*/
	public function insertar($autor){

		$result = $this->db->insert('autores',$autor);
		if($result)
			return true;
		else
			return false;
	}

}