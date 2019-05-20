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
<<<<<<< HEAD
		* Cargamos el modelo de libros, autores, y categorias
		**/
		$this->load->model('Libro_model', 'libro_model', true);
		$this->load->model('Autor_model', 'autor_model', true);
		$this->load->model('Categoria_model', 'categoria_model', true);
=======
		* Cargamos el modelo de libros
		**/
		$this->load->model('Libro_model', 'libro_model', true);
>>>>>>> 927e8eba1a43217f33717d38f522f7a5f20c49da
	}

	/**
	*
	* Autor: Manuel Santiago
	* Resumen: Este método renderiza la vista para la búsqueda de libros
	**/
	public function index()
	{
		$datos['libros'] = $this->libro_model->obtenerLibros();
<<<<<<< HEAD
		$datos['autores'] = $this->autor_model->obtenerAutores();
		$datos['categorias'] = $this->categoria_model->obtenerCategorias();
=======
>>>>>>> 927e8eba1a43217f33717d38f522f7a5f20c49da
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
<<<<<<< HEAD
		$datos['autores'] = $this->autor_model->obtenerAutores();
		$datos['categorias'] = $this->categoria_model->obtenerCategorias();
=======
>>>>>>> 927e8eba1a43217f33717d38f522f7a5f20c49da
		$datos['libro_buscado'] = $libro;
		$datos['termino'] = $nombre;
		$this->load->view('view_busqueda_libro', $datos);
	}
<<<<<<< HEAD

	/**
	*
	* Autor: Manuel Santiago
	* Resumen: Este método renderiza el formulario para registro de libro
	**/
	public function renderRegistro()
	{
		$datos['autores'] = $this->autor_model->obtenerAutores();
		$datos['categorias'] = $this->categoria_model->obtenerCategorias();
		$this->load->view('view_registro_libro', $datos);
	}

	/**
	*
	* Autor: Manuel Santiago
	* Resumen: Este método inserta un libro en la BD
	**/
	public function insertarLibro()
	{

		$libros = $this->libro_model->obtenerLibros();
		$id = count($libros)+1;
		$libro = array(
				'id_libro' => $id,
				'titulo' => $this->input->post('titulo'),
				'id_categoria' => $this->input->post('categoria'),
				'paginas' => $this->input->post('paginas'),
				'activo' => 1
			);
		$resultado = $this->libro_model->insertar($libro);
		if ($resultado) {
			foreach ($this->input->post("autores") as $value) {
				$autor_x_libro = array("id_autor" => $value, "id_libro" => $id);
				$this->libro_model->insertarAutorXLibro($autor_x_libro);
			}
		}
		$datos['mensaje'] = ($resultado) ? 'información de libro guardada' : 'Ocurrió un error al guardar la información';
		$datos['autores'] = $this->autor_model->obtenerAutores();
		$datos['categorias'] = $this->categoria_model->obtenerCategorias();
		$this->load->view('view_registro_libro', $datos);
	}

	/**
	*
	* Autor: Manuel Santiago
	* Resumen: Este método inserta un autor en la BD
	**/
	public function insertarAutor()
	{
		$autor = array (
			"id_autor" => $this->input->post("clave"),
			"nombre" => $this->input->post("nombre"),
			"apellidos" => $this->input->post("apellidos")
		);
		$resultado = $this->autor_model->insertar($autor);
		$datos['success'] = $resultado;
		if ($resultado) {
			$datos['autores'] =  $this->autor_model->obtenerAutores();
		}
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($datos);
	    exit();
	}

	/**
	*
	* Autor: Manuel Santiago
	* Resumen: Este método inserta una categoria en la BD
	**/
	public function insertarCategoria()
	{
		$categoria = array (
			"id_categoria" => $this->input->post("clave"),
			"categoria" => $this->input->post("nombre")
		);
		$resultado = $this->categoria_model->insertar($categoria);
		$datos['success'] = $resultado;
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($datos);
	    exit();
	}

	/**
	*
	* Autor: Manuel Santiago
	* Resumen: Este método cambio el estado de activo a inactivo de un libro
	**/
	public function cambiarEstado()
	{
		$estado = $this->input->post('status');
		$clave = $this->input->post('clave');
		$resultado = $this->libro_model->cambiarEstado($estado, $clave);
		$datos['success'] = $resultado;
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($datos);
	    exit();
	}

	/**
	*
	* Autor: Manuel Santiago
	* Resumen: Este método actualiza la informacion de un libro
	**/
	public function actualizarLibro()
	{
		$id = $this->input->post('idLibro');
		$libro = array(
				'titulo' => $this->input->post('titulo'),
				'id_categoria' => $this->input->post('categoria'),
				'paginas' => $this->input->post('paginas')
			);
		$resultado = $this->libro_model->actualizarLibro($libro, $id);
		$libro = $this->libro_model->buscarLibroXId($id);
		if ($resultado) {
			foreach ($this->input->post("autores") as $value) {
				$autor_x_libro = array("id_autor" => $value, "id_libro" => $id);
				$this->libro_model->insertarAutorXLibro($autor_x_libro);
			}
		}
		$datos['mensaje'] = ($resultado) ? 'información de libro guardada' : 'Ocurrió un error al guardar la información';
		$datos['autores'] = $this->autor_model->obtenerAutores();
		$datos['categorias'] = $this->categoria_model->obtenerCategorias();
		$datos['libros'] = $this->libro_model->obtenerLibros();
		$this->load->view('view_busqueda_libro', $datos);
		/*
		$estado = $this->input->post('status');
		$clave = $this->input->post('clave');
		$resultado = $this->libro_model->cambiarEstado($estado, $clave);
		$datos['success'] = $resultado;
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($datos);
	    exit();*/
	}

	/**
	*
	* Autor: Manuel Santiago
	* Resumen: Este método Retorna la informacion de un libro
	**/
	public function buscarLibroXId()
	{
		$id = $this->input->post('id_libro');
		$libro = $this->libro_model->buscarLibroXId($id);
		$datos['libro'] = $libro;
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($datos);
	    exit();
	}
}
=======
}
>>>>>>> 927e8eba1a43217f33717d38f522f7a5f20c49da
