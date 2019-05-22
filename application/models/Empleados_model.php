<?php 
	/**
	 * 
	 */
defined('BASEPATH') OR exit('No direct script access allowed');
	class Empleados_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		public function consulta_empleados(){
			return $this->db->query("SELECT * FROM empleados ")->result();
		}

		public function guardar_empleado($empleados)
		{
			return $this->db->insert('empleados',$empleados);
		}

		public function obtener_empleado(int $id)
		{
			return  $this->db->query("SELECT * FROM empleados where id_empleado={$id}")->row();
		}

		public function actualizar_empleado(int $id,string $nombre,string $apellidos,string $rol,string $email){
			return $this->db->query("UPDATE empleados set nombre={$nombre},apellidos={$apellidos},rol={$rol},email={$email} where id_empleado={$id}");
		}

		public function eliminar_empleado(int $id)
		{
			return $this->db->query("DELETE from empleados where id_empleado={$id}");
		}

	}
?>