<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!$this->session->userdata('logged_in')) {
    redirect(base_url());
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
	<link rel="stylesheet" href="<?= base_url();?>public/css/style.css" >
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<script src="<?= base_url();?>public/js/jquery-3-3-1.js"></script>    
    <script src="<?= base_url();?>public/js/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" ></script>
    <script src="<?= base_url();?>public/js/utils.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

	<title>Biblioteca</title>    
</head>
<body>
	<?php
		if ($this->session->userdata('rol') == 'empleado') {
    		$this->load->view('templates/navbar');
		} else if($this->session->userdata('rol') == 'estudiante') {
			$this->load->view('templates/navbar_estudiante');
		}
	?>	