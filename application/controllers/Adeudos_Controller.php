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
		$this->load->view('adeudos_page',$Datos);
	}

	public function insertar(){
		$resultado=$this->AM->insertarAdeudo();
		$Datos['mensaje']=($resultado)?"Adeudo registrado":"Hubo un error en insertar el adeudo";
		$Datos['Adeudos']=$this->AM->obtenerAdeudos();

		$this->load->view('ver_adeudos',$Datos);
		//echo "insertar adeudo";
	}
	/*
	by Moises Vega Hernández
		Funcion que me sirvira para buscar un adeudo ya sea poe nombre de libro o matricula 	
	*/
	public function adeudos(){
		if ($_POST) {
			$matricula=$this->input->post('b_adeudo');
		}else{
			$matricula='';
		}
		if ($matricula!='') {
			$Datos=$this->AM->ver_adeudo($matricula);
			$this->load->view("templates/header");
			$this->load->view('Adeudo',compact("Datos"));
		}else{
			echo('<br><br><a href="'.base_url().'index.php/Adeudos_Controller">error verifica tus datos regresar</a>');
		}
		
	}
}