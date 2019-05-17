<!DOCTYPE html>
<html>
<head>
	<title>B&uacute;squeda de libros</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="<?php echo base_url("public/css/style.css"); ?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<div class="row" id="busqueda">
			<form class="form-inline form-100" method="POST" action="<?php echo base_url("libros/buscar") ?>">
				<div class="form-group col-md-9">
					<input class="form-control input-100" type="text" name="nombre_libro" placeholder="Buscar libro" />
				</div>
				<div class="form-group col-md-3">
					<button type="submit" class="btn btn-block btn-primary">Buscar</button>
				</div>
			</form>
		</div>
		<div class="divider"></div>
		<div class="row">
		<?php
		/**
		* Verificamos que se haya buscado un libro
		*/
		if (isset($libro_buscado)) {
		?>
			<div class="col-md-9"><a class="btn btn-secondary" role="button" href="<?php echo base_url('libros')?>">Ver todos</a></div>
			<div class="col-md-9">Resultados de la b&uacute;squeda: <span class='termino-busqueda'><?=$termino?></span></div>
			<div class="col-md-12">
				<div class="divider"></div>
			</div>
		<?php
			if ($libro_buscado != null) {
				$visitados = array();
				foreach ($libro_buscado as $libro) {
					if (in_array($libro->id_libro, $visitados)) {
						continue;
					}
					array_push($visitados, $libro->id_libro);
					$disponible = ($libro->activo == 1) ? 'Esta disponible' : 'No esta disponible';
					?>
			<div class="col-md-3 card-libro">
				<div class="card">
					<img src="https://triunfacontulibro.com/wp-content/uploads/2016/10/icon-libro.png" class="card-img-top" alt="Libro">
					<div class="card-body">
						<h5 class="card-title"><?=$libro->titulo?></h5>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Categor&iacute;a: <?=$libro->categoria?></li>
						<li class="list-group-item">P&aacute;ginas: <?=$libro->paginas?></li>
						<li class="list-group-item"><?=$disponible ?></li>
						<li class="list-group-item">Autores:
						<?php 
						foreach ($libro_buscado as $libro_) {
							if ($libro_->id_libro == $libro->id_libro) {
						?>
						<p><?=$libro_->nombre.' '.$libro_->apellidos?></p>
						<?php
							}
						}
						 ?>
						</li>
					</ul>
					<div class="card-body">
						<a href="#" class="card-link">Prestar</a>
						<a href="#" class="card-link">Editar</a>
					</div>
				</div>
			</div>
		<?php
				}
			} else {
		?>
			<div class="alert alert-warning" role="alert">
			  	No se encontr&oacute; informaci&oacute;n para la b&uacute;squeda: <span class='termino-busqueda'><?=$termino?></span>
			  	<br>
				<a class="btn btn-secondary" role="button" href="<?php echo base_url('libros')?>">Ver todos</a>
			</div>
		<?php		
			}
		} else if (isset($termino)){
		?>
		<div class="alert alert-warning" role="alert">
			No se encontr&oacute; informaci&oacute;n para la b&uacute;squeda: <span class='termino-busqueda'><?=$termino?></span>
			<br>
			<a class="btn btn-secondary" role="button" href="<?php echo base_url('libros')?>">Ver todos</a>
		</div>
		<?php
		}
		?>
		</div>
		<?php
		if (isset($libros))
		{
			if(count($libros) == 0)
			{
		?>
		<div class="alert alert-warning" role="alert">
		  No hay libros registrados
		</div>
		<?php
			} else {
		?>
		<div class="row">
		<?php
			$visitados = array();
			foreach ($libros as $libro) {
				if (in_array($libro->id_libro, $visitados)) {
					continue;
				}
				array_push($visitados, $libro->id_libro);
				$disponible = ($libro->activo == 1) ? 'Esta disponible' : 'No esta disponible';
		?>
			<div class="col-md-3 card-libro">
				<div class="card">
					<img src="https://triunfacontulibro.com/wp-content/uploads/2016/10/icon-libro.png" class="card-img-top" alt="Libro">
					<div class="card-body">
						<h5 class="card-title"><?=$libro->titulo?></h5>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Categor&iacute;a: <?=$libro->categoria?></li>
						<li class="list-group-item">P&aacute;ginas: <?=$libro->paginas?></li>
						<li class="list-group-item"><?=$disponible ?></li>
						<li class="list-group-item">Autores:
						<?php 
						foreach ($libros as $libro_) {
							if ($libro_->id_libro == $libro->id_libro) {
						?>
						<p><?=$libro_->nombre.' '.$libro_->apellidos?></p>
						<?php
							}
						}
						 ?>
						</li>
					</ul>
					<div class="card-body">
						<a href="#" class="card-link">Prestar</a>
						<a href="#" class="card-link">Editar</a>
					</div>
				</div>
			</div>
		<?php
				}
		?>
		</div>
		<?php
			}
		}
		?>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>