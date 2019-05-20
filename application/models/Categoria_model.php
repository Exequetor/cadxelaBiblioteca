<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Autor: Manuel Santiago
**/
/**
* Resumen: Esta clase representa el modelo de la clase Libro,
* acá incluímos todos los métodos relacionados con los libros gestionados en la biblioteca
**/

class Categoria_model extends CI_Model {
	/* Definición de atributos */
	public $id_categoria;
	public $categoria;

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
	* Resumen: Este método realiza la búsqueda de todos las categorias registradas
	* Salida: Un array con la información de las categorias registradas en la BD
	*/
	public function obtenerCategorias(){
		$results = $this->db->get('categorias');
		
		return $results->result();
	}

	/*
	*
	* Autor: Manuel Santiago
	* Resumen: Este método inserta una nueva categoria en la BD
	* Entrada categoria: La informacion de la categoria a guardar
	* Salida: Un indicador de verdadero o falso segun corresponda el exito de la operacion
	*/
	public function insertar($categoria){

		$result = $this->db->insert('categorias',$categoria);
		if($result)
			return true;
		else
			return false;
	}

}