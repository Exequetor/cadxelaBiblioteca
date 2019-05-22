<main role="main" class="container">
<h1>Modificación de estudiante</h1>
		<form class="form-horizontal" role="form" action="<?=base_url()?>index.php/estudiantes/update" method="POST" >
			<div class="form-group w-50">
				<label>Matrícula</label>
				<input type="text" class="form-control" pattern=".{10,10}" maxlength="10" name="matricula" id="matricula" placeholder="Ingrese la matrícula de 10 dígitos" value="<?=$estudiante->matricula?>" readonly="readonly">
			</div>
			
			<div class="form-group">
				<label>Nombre</label>
				<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre/s sin abreviatura del estudiante" required value="<?=$estudiante->nombre?>">	
			</div>

			<div class="form-group">
				<label>Apellidos</label>
				<input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos sin abreviatura del estudiante" required value="<?=$estudiante->apellidos?>">	
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" id="password" placeholder="Password del estudiante">	
			</div>

			<div class="form-group">
				<label>Activo</label>
				<input type="checkbox" name="activo" id="activo" <?=$estudiante->activo?'checked':''?>> 
			</div>

			<button type="submit"class="btn btn-primary" >Actualizar estudiante</button>
		</form>
</main>
</body>
</html>