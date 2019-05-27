<!DOCTYPE html>
<html>
<head>
	<title>Adeudos</title>
	<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/>
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>
<div class="container">
		<div class="row justify-content-center">
		<div class="col-sm-12">
		<h3>Adeudos</h3>
		<div class="form-group">
 		<div class="row">		
			<div class="form-group col-md-9">
				<input class="form-control input-100" id="busqueda" type="text" name="busqueda" placeholder="Buscar adeudo por matricula" />
			</div>
			<div class="form-group col-md-3">
				<button type="submit" class="btn btn-block btn-primary">Buscar</button>
				<a href="<?php echo base_url();?>index.php/adeudos" class="btn btn-block btn-primary">Agregar adeudo</a>
			</div>
		</div>
		<table class="table table-bordered" id="tabla_adeudos">
			<thead>
					<tr>
						<th scope="col">Matricula</th>
						<th scope="col">Estudiante</th>
						<th scope="col">Titulo del libro en adeudo</th>
						<th scope="col">Descripción</th>
						<th scope="col">Fecha adeudo</th>
						<th scope="col">Fecha reposición</th>
					</tr>
			</thead>
			<?php 
				try{
					if(isset($Adeudos)){
						foreach($Adeudos as $adeudos){
		?> <tr id="<?=$adeudos->nombre?> <?=$adeudos->apellidos?>">
				<td><?=$adeudos->matricula?></td>
			    <td><?=$adeudos->nombre?> <?=$adeudos->apellidos?></td>
			    <td><?=$adeudos->titulo?></td>
			    <td><?=$adeudos->descripcion?></td>
			    <td><?=$adeudos->fecha_adeudo?></td>
			    <td><?=$adeudos->fecha_reposicion?></td>
			</tr>
		<?php
			}
			}
				}catch(Exception $e){
						var_dump($e->getMessage());
				}
		?>
		</table>
		</div>		
		</div>
	</div>
</body>
<script>
$(document).ready(function(){
	$("#busqueda").keyup(function(){
	_this = this;
	$.each($("#tabla_adeudos tbody tr"), function() {
		if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
		$(this).hide();
		else
		$(this).show();
	});
	});
});
</script>
</html>