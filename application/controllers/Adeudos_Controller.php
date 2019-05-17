<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Autor: Luisa Ivonne
**/
/**
* Resumen: Esta clase representa un controlador para la clase Adeudos,
* acá incluímos todos los métodos relacionados con los adeudos gestionados en la biblioteca
**/
class Adeudos_Controller extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		/**
		* Cargamos el modelo de adeudos
		**/
		$this->load->model('Adeudos_Model', 'AM', true);
	}
	public function index(){
		$Datos['Estudiantes']=$this->AM->obtenerEstudiantes();
		$Datos['LibrosPrestados']=$this->AM->obtenerLibrosPrestados();
		/*$datos = array(
			'dato_titulo' => $titulo
		);*/

		$this->load->view('adeudos_page',$Datos);
	}

	public function insertar(){
		$resultado=$this->AM->insertarAdeudo();
		$Datos['mensaje']=($resultado)?"Adeudo registrado":"Hubo un error en insertar el adeudo";
		$Datos['Adeudos']=$this->AM->obtenerAdeudos();

		$this->load->view('ver_adeudos',$Datos);
		//echo "insertar adeudo";
	}
}