<!DOCTYPE html>
<html>
<head>
	<title>Registro de libro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	<link href="<?php echo base_url("public/css/style.css"); ?>" rel="stylesheet" type="text/css">
</head>
<body>
	<?php $this->load->view('templates/navbar'); ?>	
	<div class="container">
		<div class="row" id="busqueda">
			<?php 
			if (isset($mensaje)) {
			?>
				<div class="alert alert-warning" role="alert">
				  	<?=$mensaje?>
				  	<br>
					<a class="btn btn-secondary" role="button" href="<?php echo base_url('libros')?>">Ver todos los libros</a>
				</div>
			<?php
			}
			 ?>
			<form class="form-100" method="POST" action="<?php echo base_url("index.php/libros/registro/send") ?>">
				<div class="row">
					<div class="form-group col-md-2">
						<label>Seleccionar autor(es):</label>
					</div>
					<div class="form-group col-md-6">
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
					<div class="col-md-4">
						<button rol="button" class="btn btn-light" data-toggle="modal" data-target="#registroAutorModal">Registrar nuevo autor</button>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-2">
						<label>Seleccionar categoria:</label>
					</div>
					<div class="form-group col-md-6">
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
					<div class="form-group col-md-4">
						<button rol="button" class="btn btn-light" data-toggle="modal" data-target="#registroCategoriaModal">Registrar nueva categor&iacute;a</button>
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
				<div class="row">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
	<!-- Modal registro autor -->
	<div class="modal fade" id="registroAutorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Registro de libro</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="claveAutor">Clave:</label>
						<?php 
						$valueClave = 1;
						if (isset($autores)) {
							$valueClave = count($autores) + 1;
						}
						 ?>
						<input type="number" required="" readonly="" value="<?=$valueClave?>" class="form-control" id="claveAutor" name='clave' placeholder="">
					</div>
					<div class="form-group">
						<label for="nombreAutor">Nombre:</label>
						<input type="text" required="" class="form-control" id="nombreAutor" name='clave' placeholder="">
					</div>
					<div class="form-group">
						<label for="apellidosAutor">Apellidos:</label>
						<input type="text" required="" class="form-control" id="apellidosAutor" name='clave' placeholder="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" id="guardarAutor" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal registro categoria -->
	<div class="modal fade" id="registroCategoriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Registro de categoria</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Clave:</label>
						<?php 
						$valueClaveCat = 1;
						if (isset($categorias)) {
							$valueClaveCat = count($categorias) + 1;
						}
						 ?>
						<input type="number" required="" readonly="" value="<?=$valueClaveCat?>" class="form-control" id="claveCategoria" name='clave' placeholder="">
					</div>
					<div class="form-group">
						<label for="">Nombre:</label>
						<input type="text" required="" class="form-control" id="nombreCategoria" name='clave' placeholder="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" id="guardarCategoria" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		const url = 'http://localhost/cadxelaBiblioteca/index.php/';
		const guardarAutorBtn = $("#guardarAutor");
		const claveAutor = $("#claveAutor");
		const nombreAutor = $("#nombreAutor");
		const apellidosAutor = $("#apellidosAutor");
		const guardarCategoriaBtn = $("#guardarCategoria");
		const claveCategoria = $("#claveCategoria");
		const nombreCategoria = $("#nombreCategoria");
		const autores = $("#autores");
		const categoria = $("#categoria");
		/**
		* Presionar el boton de guardar autor
		*/
		guardarAutorBtn.on('click', function() {
			const valueClave = claveAutor.val();
			const valueNombre = nombreAutor.val();
			const valueApellidos = apellidosAutor.val();
			if (valueClave === '') {
				alert("Ingrese la clave");
				return;
			}
			if (valueNombre === '') {
				alert("Ingrese el nombre");
				return;
			}
			if (valueApellidos === '') {
				alert("Ingrese los apellidos");
				return;
			}
			$.post( url+"libros/registro/autor", { clave: valueClave, nombre: valueNombre, apellidos: valueApellidos})
			.done(function( data ) {
				if (data.success) {
					autores.append("<option value='"+valueClave+"'>"+valueNombre+" "+valueApellidos+"</option>");
					autores.selectpicker('refresh');
					alert("Autor guardado");
					$("#registroAutorModal").modal('hide');
				} else {
					alert("No se pudo guardar la información");
				}
			});
		})

		/**
		* Presionar el boton de guardar categoria
		*/
		guardarCategoriaBtn.on('click', function() {
			const valueClave = claveCategoria.val();
			const valueNombre = nombreCategoria.val();
			if (valueClave === '') {
				alert("Ingrese la clave");
				return;
			}
			if (valueNombre === '') {
				alert("Ingrese el nombre");
				return;
			}
			$.post( url+"libros/registro/categoria", { clave: valueClave, nombre: valueNombre})
			.done(function( data ) {
				if (data.success) {
					categoria.append("<option value='"+valueClave+"'>"+valueNombre+"</option>");
					categoria.selectpicker('refresh');
					alert("Categoria guardada");
					$("#registroCategoriaModal").modal('hide');
				} else {
					alert("No se pudo guardar la información");
				}
			});
		})
	})
</script>
</html>