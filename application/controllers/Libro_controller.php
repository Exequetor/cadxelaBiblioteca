<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Autor: Manuel Santiago
**/
/**
* Resumen: Esta clase representa un controlador para la clase Libro,
* acá incluímos todos los métodos relacionados con los libros gestionados en la biblioteca
**/
class Libro_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		/**
		* Cargamos el modelo de libros
		**/
		$this->load->model('Libro_model', 'libro_model', true);
	}

	/**
	*
	* Autor: Manuel Santiago
	* Resumen: Este método renderiza la vista para la búsqueda de libros
	**/
	public function index()
	{
		$datos['libros'] = $this->libro_model->obtenerLibros();
		$this->load->view('view_busqueda_libro', $datos);
	}

	/**
	*
	* Autor: Manuel Santiago
	* Resumen: Este método busca un libro y renderiza la información
	**/
	public function buscarLibro()
	{
		$nombre = $this->input->post('nombre_libro');
		$libro = $this->libro_model->buscarLibroPorNombre($nombre);
		$datos['libro_buscado'] = $libro;
		$datos['termino'] = $nombre;
		$this->load->view('view_busqueda_libro', $datos);
	}
}
