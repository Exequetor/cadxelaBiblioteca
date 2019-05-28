<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!--
* @Author: Carlos Hernández Montellano [Exequetor]
* @Materia: Programación web
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
	<link rel="stylesheet" href="<?= base_url();?>public/css/login.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <script src="<?= base_url();?>public/js/particles.min.js"></script>

	<title>Biblioteca</title>    
</head>
<body>
	<div id="particles-js"></div>

	<div class="container mx-auto">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h4>Iniciar sesión</h4>
				</div>
				<?php
					if(isset($bad_login)) {
						echo($alert);
					}
				?>
				<div class="card-body">
					<form role="form" action="<?=base_url()?>index.php/login/signin" method="POST">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" id="user" name="user" class="form-control" placeholder="Matrícula/Correo" required>
							
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
						</div>
						<div class="custom-control custom-radio">
  							<input type="radio" class="custom-control-input" id="estudiante" name="rol" value="estudiante" checked>
 							<label class="custom-control-label" for="estudiante">Entrar como estudiante</label>
						</div>
						<div class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" id="empleado" name="rol" value="empleado">
							<label class="custom-control-label" for="empleado">Entrar como empleado</label>
						</div>
						<br>
						<div class="form-group">
							<input type="submit" value="Iniciar sesión" class="btn float-right btn-info">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		var base_url = window.location.origin;
		particlesJS.load('particles-js', base_url.concat('/cadxelaBiblioteca/public/js/particles.json'), function() {
		  console.log('callback - particles.js config loaded');
		});
	</script>
</body>
</html>