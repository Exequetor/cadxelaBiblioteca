<div class="container">
		<h2>Modificar empleado</h2><hr>
		<form action="<?=base_url()?>index.php/empleado_controller/acualizar_empleado" method="POST">
			<div class="form-group colxs-6">
				<label>ID</label>
				<input type="text" readonly="true" class="form-control" name="id" value="<?php echo $empleado->id_empleado; ?>">
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col colxs-6">
					<div class="input-group form-group">
						<span class="input-group-addon">
							Nombre
						</span>
						<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $empleado->nombre; ?>" placeholder="Nombre">
					</div>
				</div>
				<div class="col colxs-6">
					<div class="input-group form-group">
						<span class="input-group-addon">
							Apellido
						</span>
						<input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $empleado->apellidos; ?>" placeholder="apellidos">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col colxs-6">
					<div class="input-group form-group">
						<span class="input-group-addon">
							Rol
						</span>
						<input type="text" class="form-control" id="rol" name="rol" value="<?php echo $empleado->rol; ?>" placeholder="Rol">
					</div>
				</div>
				<div class="col colxs-6">
					<div class="input-group form-group">
						<span class="input-group-addon">
							Email
						</span>
						<input type="text" class="form-control" id="email" name="email" value="<?php echo $empleado->email; ?>" placeholder="Email">
					</div>
				</div>
			</div>
			<div class="text-center" >
				<input type="submit" name="modificar" class="btn btn-success" value="Modificar" ></input>
				<a href="<?=base_url()?>index.php/empleado_controller" class="btn btn-primary">Cancelar</a>
			</div>
			
		</form>
	</div>