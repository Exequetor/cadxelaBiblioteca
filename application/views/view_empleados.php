<!DOCTYPE html>
<html>
<head>
	<title>CRUD empleados</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h2>Opciones de empleados</h2><hr>
		<form action="" method="post">
			<div>
				<input type="text" name="id_empleado" id="id_empleado" value="">
			</div>
			<div class="row">
				<div class="col colxs-6">
					<div class="input-group form-group">
						<span class="input-group-addon">
							Nombre
						</span>
						<input type="text" class="form-control" id="nombre" name="nombre
						" value="" placeholder="Nombre">
					</div>
				</div>
				<div class="col colxs-6">
					<div class="input-group form-group">
						<span class="input-group-addon">
							Apellido
						</span>
						<input type="text" class="form-control" id="apellidos" name="apellidos
						" value="" placeholder="apellidos">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col colxs-6">
					<div class="input-group form-group">
						<span class="input-group-addon">
							Rol
						</span>
						<input type="text" class="form-control" id="rol" name="rol
						" value="" placeholder="Rol">
					</div>
				</div>
				<div class="col colxs-6">
					<div class="input-group form-group">
						<span class="input-group-addon">
							Email
						</span>
						<input type="text" class="form-control" id="email" name="email
						" value="" placeholder="Email">
					</div>
				</div>
			</div>
			<div class="text-center" >
				<button type="submit" class="btn btn-success" >Gardar</button>
				<a href="" class="btn btn-primary">Nuevo empleado</a>
			</div>
			<div class="container">
				<h3>Empleados Registrados</h3><hr>
				<table class="table table-bordered table-hover" >
					<thead>
						<th>Identificador</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Rol</th>
						<th>Email</th>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</form>
	</div>
</body>
</html>