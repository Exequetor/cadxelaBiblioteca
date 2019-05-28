<main role="main" class="container">
	<div class="centrado subtle-box">
		
		<!-- Tabla de estudiantes dentro del sistema -->
		<center><h1>Estudiantes registrados</h1></center>
		<div class="alert alert-info">
			<center>Haz click en la matrícula de un estudiante para modificar sus datos o sus adeudos</center>
		</div>
		<table id="data-table" class="display data-table">
			<thead>
		        <tr>
		            <th>Matrícula</th>
		            <th>Nombre</th>
		            <th>Apellidos</th>
		            <th>Activo</th>
		        </tr>
		    </thead>
		    <tbody>
		    <?php
		    	if (isset($query))
			        foreach ($query->result() as $row) {
			        	echo('<tr>');
			        	echo('<td>');
			        		echo('<a href="'.base_url().'index.php/estudiantes/update/'.$row->matricula.'">'.$row->matricula.'</a>');
			        	echo('</td>');
			        	echo('<td>');echo($row->nombre);echo('</td>');
			        	echo('<td>');echo($row->apellidos);echo('</td>');
			        	echo('<td>');echo($row->activo?'Si':'No');echo('</td>');
			        	echo('</tr>');
			        }
		    ?>
		    </tbody>
		</table>
		
		<!-- Formulario para nuevo registro de estudiantes -->
		<center><h1>Registrar nuevo estudiante</h1></center>
		<form class="form-horizontal" role="form" action="<?=base_url()?>index.php/estudiantes/insert" method="POST" >

			<div class="form-group w-50">
				<label>Matrícula</label>
				<input type="text" class="form-control" pattern=".{10,10}" maxlength="10" name="matricula" id="matricula" placeholder="Ingrese la matrícula de 10 dígitos" required>
			</div>
			
			<div class="form-group">
				<label>Nombre</label>
				<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre/s sin abreviatura del estudiante" required>	
			</div>

			<div class="form-group">
				<label>Apellidos</label>
				<input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos sin abreviatura del estudiante" required>	
			</div>

			<button type="submit"class="btn btn-primary" >Agregar estudiante</button>
		</form>
		<br>

	</div>
</body>
</html>