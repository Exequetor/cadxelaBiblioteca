<!DOCTYPE html>
<html>
<head>
	<title>B&uacute;squeda de libros</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	<link href="<?php echo base_url("public/css/style.css"); ?>" rel="stylesheet" type="text/css">
</head>
<body>
	<?php $this->load->view('templates/navbar'); ?>	
	<div class="container">
		<div class="row" id="busqueda">
			<form class="form-inline form-100" method="POST" action="<?php echo base_url("index.php/libros/buscar") ?>">
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
		if (isset($mensaje)) {
			?>
			<div class="alert alert-warning" role="alert">
			  	<?=$mensaje?>
			</div>
			<?php
		}
		 ?>
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
					$autores = "";
					array_push($visitados, $libro->id_libro);
					$disponible = ($libro->activo == 1) ? true : false;
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
						<li class="list-group-item">Autores:
						<?php 
						foreach ($libro_buscado as $libro_) {
							if ($libro_->id_libro == $libro->id_libro) {
								$autores .= $libro_->id_autor.'-';
								//array_push($autores, $libro_->id_autor);
						?>
						<p><?=$libro_->nombre.' '.$libro_->apellidos?></p>
						<?php
							}
						}
						 ?>
						</li>
						<li class="list-group-item">
							<div class="custom-switch" style="padding-left: 0 !important;">
								<label style="margin-right: 40px;">Inactivo</label>
							  	<input class="custom-control-input changeActivo" type="checkbox" <?php echo ($disponible) ? "checked" : "" ?> class="custom-control-input" id="<?=$libro->id_libro?>">
							  	<label class="custom-control-label" for="<?=$libro->id_libro?>">Activo</label>
							</div>
						</li>
					</ul>
					<div class="card-body">
						<a href="#" class="card-link">Prestar</a>
						<a href="#" class="card-link" onclick='openModal(<?=$libro->id_libro?>,<?=$libro->titulo?>,<?=$libro->paginas?>,<?=$libro->id_categoria?>,<?=$autores?>)'>Editar</a>
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
				$disponible = ($libro->activo == 1) ? true : false;
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
						<li class="list-group-item">Autores:
						<?php 
						foreach ($libros as $libro_) {
							if ($libro_->id_libro == $libro->id_libro) {
								//array_push($autores, $libro_->id_autor);
						?>
						<p><?=$libro_->nombre.' '.$libro_->apellidos?></p>
						<?php
							}
							$ready = true;
						}
						 ?>
						</li>
						<li class="list-group-item">
							<div class="custom-switch" style="padding-left: 0 !important;">
								<label style="margin-right: 40px;">Inactivo</label>
							  	<input class="custom-control-input changeActivo" type="checkbox" <?php echo ($disponible) ? "checked" : "" ?> class="custom-control-input" id="<?=$libro->id_libro?>">
							  	<label class="custom-control-label" for="<?=$libro->id_libro?>">Activo</label>
							</div>
						</li>
					</ul>
					<div class="card-body">
						<a href="#" class="card-link">Prestar</a>
						<a href="#" class="card-link" onclick='openModal(<?=$libro->id_libro?>)'>Editar</a>
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
	<!-- Modal cambiar estado a inactivo -->
	<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form class="form-100" method="POST" action="<?php echo base_url("index.php/libros/editar") ?>">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Editar informaci&oacute;n de un libro</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="idLibro" id="idLibro">
						<div class="row">
							<div class="form-group col-md-3">
								<label>Seleccionar autor(es):</label>
							</div>
							<div class="form-group col-md-9">
								<select class="selectpicker" id="autores" name="autores[]" multiple required="">
									<?php 
									if (isset($autores)) {
										foreach ($autores as $autor) {
											echo "<option value='".$autor->id_autor."'>".$autor->nombre." ".$autor->apellidos."</option>";
										}
									}
									 ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-3">
								<label>Seleccionar categoria:</label>
							</div>
							<div class="form-group col-md-9">
								<select class="selectpicker" id="categoria" name="categoria" required="">
									<?php 
									if (isset($categorias)) {
										foreach ($categorias as $categoria) {
											echo "<option value='".$categoria->id_categoria."'>".$categoria->categoria."</option>";
										}
									}
									 ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label for="tituloLibro">T&iacute;tulo del libro:</label>
								<input type="text" required="" class="form-control form-100" id="tituloLibro" name='titulo' placeholder="">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label for="paginasLibro">P&aacute;ginas:</label>
								<input type="number" required="" min="1" class="form-control form-100" id="paginasLibro" name='paginas' placeholder="">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="button" id="guardarAutor" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
	const url = 'http://localhost/cadxelaBiblioteca/index.php/';
	$(document).ready(function () {
		$(".changeActivo").on('change', function() {
			let id = $(this).prop('id')
			let status = $(this).prop('checked')
			$.post( url+"libros/registro/status", { clave: id, status: status})
			.done(function( data ) {
				console.table(data)
			});
		});
	})
	function openModal(id_libro) {
		$.post( url+"libros/buscar_x_id", { id_libro: id_libro})
		.done(function( data ) {
			if (data !== null) {
				$("#idLibro").val(data.libro[0].id_libro);
				$("#tituloLibro").val(data.libro[0].titulo);
				$("#paginasLibro").val(data.libro[0].paginas);
				$("#categoria").val(data.libro[0].id_categoria);
				$("#categoria").selectpicker('refresh');
				let autores = []
				for(let i = 0; i < data.libro.length; i++) {
					autores[autores.length] = data.libro[i].id_autor;
				}				
				$("#autores").val(autores);
				$("#autores").selectpicker('refresh');	
				$("#editarModal").modal("show");
			}
		});
	}
</script>
</html>