<main role="main" class="container">
	<h1>Libros adeudados por el estudiante</h1>
	<table id="data-table" class="display data-table">
			<thead>
		        <tr>
		            <th>Identificador</th>
		            <th>Título</th>
		            <th>Descripción</th>
		            <th>Fecha de registro</th>
		            <th>Fecha de reposición</th>
		            <th>Estado</th>
		            <th></th>
		        </tr>
		    </thead>
		    <tbody>
			<?php
			foreach($adeudos as $adeudo) {
				echo('<tr>');
				echo('<td>');echo($adeudo['id_libro']);echo('</td>');
				echo('<td>');echo($adeudo['titulo']);echo('</td>');
				echo('<td>');echo($adeudo['descripcion']);echo('</td>');
				echo('<td>');echo($adeudo['fecha_adeudo']);echo('</td>');
				echo('<td>');echo($adeudo['fecha_reposicion']);echo('</td>');
				echo('<td>');echo($adeudo['estado']?'<p style="color:red;">En deuda</p>':'<p style="color:green;">Devuelto</p>');echo('</td>');
				echo('<td>');
				echo('<a class="btn btn-success" href="'.base_url().'index.php/estudiantes/status/'.$adeudo['id_adeudo'].'"> Cambiar estado</a>');
				echo('</td>');
				echo('</tr>');
			}
			?>
		</tbody>
	</table>
	<h1>Modificación de datos del estudiante</h1>
	<form class="form-horizontal" role="form" action="<?=base_url()?>index.php/estudiantes/update" method="POST" >
		<div class="form-group w-50">
			<label>Matrícula</label>
			<input type="text" class="form-control" pattern=".{10,10}" maxlength="10" name="matricula" id="matricula" value="<?=$estudiante->matricula?>" readonly="readonly">
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