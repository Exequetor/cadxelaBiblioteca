<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model("Empleados_model");
	}

	public function index()
	{
		$Empleados=$this->Empleados_model->consulta_empleados();
		$this->load->view("view_empleados",compact("Empleados"));
		
	}
	public function guardar_empleado(){
		if ($this->input->post("guardar")) 
		{
			$empleados =array(
				'id_empleado' => $this->input->post('id_empleado'),
				'nombre' => $this->input->post('nombre'),
				'apellidos' => $this->input->post('apellidos'),
				'rol' => $this->input->post('rol'),
				'email' => $this->input->post('email')
			);
			if ($this->Empleados_model->guardar_empleado($empleados)) {
     header("Location:".base_url()."empleado_controller");
				}	
		}
	}
	public function modificar_empleado($id=null)
	{
		if (!$id==null) {
			$id=$this->db->escape((int)$id);
			$empleado=$this->Empleados_model->obtener_empleado($id);
			$this->load->view("view_modificar_empleado",compact("empleado"));
		}else{
			header("Location:".base_url()."empleado_controller");
		}
	}
	public function acualizar_empleado(){
		 if ($this->input->post()) 
		{
			$id_empleado=$this->db->escape((int)$_POST["id"]);
			$nombre = $this->db->escape($_POST["nombre"]);
			$apellidos = $this->db->escape($_POST["apellidos"]);
			$rol = $this->db->escape($_POST["rol"]);
			$email = $this->db->escape($_POST["email"]);
		
			if ($this->Empleados_model->actualizar_empleado($id_empleado,$nombre,$apellidos,$rol,$email)) {
              		header("Location:".base_url()."empleado_controller");
				}	
		}
	}

	public function eliminar_empleado(int $id){
			if ($this->Empleados_model->eliminar_empleado($id)) 
			{
				header("Location:".base_url()."empleado_controller");
			}
	}
}