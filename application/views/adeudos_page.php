<!DOCTYPE html>
<html>
<head>
	<title>Registro de adeudos</title>
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
    <!--Barra de busqueda de adeudos By Moises Vega Hernández-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0" action="<?=base_url()?>index.php/adeudos_Controller/adeudos" method="POST">
        <input name="b_adeudo" id="b_adeudo" class="form-control mr-sm-6" type="search" placeholder="Buscar Adeudo" aria-label="Search">
        <button class="btn btn-primary" type="submit">Buscar adeudo</button>
      </form>
    </div> 
  </nav>
    <!--fin de barra de busqueda de adeudos-->
		<table class="table table-bordered">
			<thead>
					<tr>
						<th scope="col">Matricula</th>
						<th scope="col">Nombre</th>
						<th scope="col">Apellidos</th>
						<th scope="col">Libros Prestados</th>
					</tr>
			</thead>
			<?php 
				try{
					if(isset($Estudiantes)){
						foreach($Estudiantes as $estudiante){
		?> <tr id="<?php echo $estudiante['matricula'];?>">
				<td><?php echo $estudiante['matricula'];?><!--<input type="hidden" id="matricula_estudiante" name="matricula_estudiante" class="form-control" placeholder=<?php echo $estudiante['matricula'];?>>--></td>
			    <td><?php echo $estudiante['nombre']; ?></td>
			    <td><?php echo $estudiante['apellidos'];?></td>
			    <td>
			   	<?php
			   		foreach ($LibrosPrestados as $libros) {
			   			if($libros['matricula']==$estudiante['matricula']){
			   	?>
			    <table class="table"><tr id='<?php echo $libros['titulo'];?>'><input type="button" id="<?php echo $libros['id_libro'];?>" class="btn btn-primary" data-toggle="modal" data-target="#ModalRegistro" value="<?php echo $libros['titulo'];?>"/><td></td></tr></table>
			   	<?php
			   		}}
			   	?>
			   </td>
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
  <!-- Modal -->
<div class="modal fade" id="ModalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Registro de adeudo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="form-group">
   <form action="<?php echo base_url().'index.php/adeudos/insertar';?>" method="POST">
    <div class="form-group">
      <label for="ControlInputText">Matricula</label>
      <input class="form-control" readonly="" name="matricula_estudiante" id="matricula_estudiante" value="0000000001"/>
    </div>
    <div class="form-group">
      <label for="ControlInputText">Libro</label>
      <input class="form-control" readonly="" name="id_libro" id="id_libro" value="1"/>
    </div>
    <div class="form-group">
      <label for="ControlTextarea">Descripción</label>
      <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group">
    	<label for="ControlFechaAdeudo">Fecha de adeudo</label>
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' id="fechaadeudo" name="fechaadeudo" class="form-control" />
            <span class="input-group-addon">
        		<span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>
    </div>
    <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
            $(function () {
                $('#datetimepicker2').datetimepicker();
            });
            $('input[type=button]' ).click(function() {
              var bid = this.id; // button ID 
              var trid = $(this).closest('tr').attr('id'); // table row ID 
              var matricula = document.getElementById("matricula_estudiante").value = trid;
              var id_libro = document.getElementById("id_libro").value = bid;
            });
    </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>