	
	<div class="container">
		<div class="container">
				<h3> Adedos </h3><hr>
				<table class="table table-bordered table-hover" >
					<thead class="text-center">
						<th>Libro Prestado</th>
						<th>Matricula</th>
						<th>Estudiante</th>
						<th>Fecha de vencimiento</th>
					</thead>
					<tbody>
						<?php
							foreach ($Datos as $adeudo) {
								echo "<tr><td>".$adeudo->titulo."</td>".
									"<td>".$adeudo->matricula_estudiante."</td>".
									"<td>".$adeudo->nombre."</td>".
									"<td>".$adeudo->fecha_reposicion."</td>"."</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
			<div class="text-center">
				<a href="<?=base_url()?>index.php/adeudos_Controller" class="btn btn-primary">Regresar</a>
			</div>
	</div>
