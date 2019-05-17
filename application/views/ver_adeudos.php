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
		<div class="col-sm-8">
		<h3>Registro de adeudos</h3>
		<table class="table table-bordered">
			<thead>
					<tr>
						<th scope="col">Matricula</th>
						<th scope="col">Nombre</th>
						<th scope="col">Titulo</th>
						<th scope="col">Descripción</th>
						<th scope="col">Fecha adeudo</th>
						<th scope="col">Fecha reposición</th>
					</tr>
			</thead>
			<?php 
				try{
					if(isset($Adeudos)){
						foreach($Adeudos as $adeudos){
		?> <tr>
				<td><?=$adeudos->matricula?></td>
			    <td><?=$adeudos->nombre?></td>
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
</html>