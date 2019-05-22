	
	<div class="container">
		<h2>Opciones de empleados</h2><hr>
		<form action="<?=base_url()?>index.php/empleado_controller/guardar_empleado" method="POST">
			<div>
				<div class="input-group form-group">
				<span class="input-group-addon">
							Identificador de empledo
						</span>
				<input type="text" name="id_empleado" id="id_empleado" value="" placeholder="Identificador de empledo">
			</div>
			</div>
			<div class="row">
				<div class="col colxs-6">
					<div class="input-group form-group">
						<span class="input-group-addon">
							Nombre
						</span>
						<input type="text" class="form-control" id="nombre" name="nombre" value="" placeholder="Nombre" required="">
					</div>
				</div>
				<div class="col colxs-6">
					<div class="input-group form-group">
						<span class="input-group-addon">
							Apellido
						</span>
						<input type="text" class="form-control" id="apellidos" name="apellidos" value="" placeholder="apellidos" required="">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col colxs-6">
					<div class="input-group form-group">
						<span class="input-group-addon">
							Rol
						</span>
						<input type="text" class="form-control" id="rol" name="rol" value="" placeholder="Rol" required="">
					</div>
				</div>
				<div class="col colxs-6">
					<div class="input-group form-group">
						<span class="input-group-addon">
							Email
						</span>
						<input type="email" class="form-control" id="email" name="email" value="" placeholder="Email" required="">
					</div>
				</div>
			</div>
			<div class="text-center" >
				<input type="submit" name="guardar" class="btn btn-primary" value="Guardar Nuevo Emoleado" ></input>
			</div>
			
		</form>

		<div class="container">
				<h3>Empleados Registrados</h3><hr>
				<table class="table table-bordered table-hover" >
					<thead class="text-center">
						<th>Identificador</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Rol</th>
						<th>Email</th>
						<th colspan="2">Opciones</th>
					</thead>
					<tbody>
						<?php
							foreach ($Empleados as $empleadoss) {
								echo "<tr><td>".$empleadoss->id_empleado."</td>".
									"<td>".$empleadoss->nombre."</td>".
									"<td>".$empleadoss->apellidos."</td>".
									"<td>".$empleadoss->rol."</td>".
									"<td>".$empleadoss->email."</td>".
									"<td><a href='empleado_controller/modificar_empleado/".$empleadoss->id_empleado."'>Modificar</a></td>".
									"<td><a href='empleado_controller/eliminar_empleado/".$empleadoss->id_empleado."'>Eliminar</a></td>"."</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		<!--<a href="<?php echo base_url().'libros'?>">
			Ir a busqueda de libro
		</a>-->
	</div>
