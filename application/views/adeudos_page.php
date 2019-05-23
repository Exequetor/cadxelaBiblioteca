<!DOCTYPE html>
<html>
<head>
	<title>Registro de adeudos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>
  <?php $this->load->view('templates/navbar'); ?> 
  <div class="container" style="margin-top: 65px;">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h3>Pr&eacute;stamos</h3>
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
          <tbody>
            <?php 
            try{
             if(isset($Estudiantes)){
              foreach($Estudiantes as $estudiante){
                ?> <tr id="<?php echo $estudiante['matricula'];?>">
                  <td><?php echo $estudiante['matricula'];?><!--<input type="hidden" id="matricula_estudiante" name="matricula_estudiante" class="form-control" placeholder=<?php echo $estudiante['matricula'];?>>--></td>
                  <td><?php echo $estudiante['nombre']; ?></td>
                  <td><?php echo $estudiante['apellidos'];?></td>
                  <td>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Libro</th>
                          <th scope="col">Fecha de entrega</th>
                          <th scope="col">Tiempo restante del pr&eacute;stamo</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                   <?php
                   foreach ($LibrosPrestados as $libros) {
                     if($libros['matricula']==$estudiante['matricula']){
                      $devolucion = new DateTime($libros['fecha_devolucion']);
                       ?>
                          <tbody>
                            <tr id='<?php echo $libros['matricula'];?>'>
                              <td><?=$libros['titulo']?></td>
                              <td><?=$devolucion->format('d/m/Y')?></td>
                              <td><?php 
                              $now = new DateTime();
                              if ($now < $devolucion) {
                                echo $devolucion->diff($now)->format('%a días'). " para que se entregue el libro.";
                              }
                              if ($now > $devolucion) {
                                echo "El libro se debió entregar hace ".$devolucion->diff($now)->format('%a días');
                              }
                              if ($now == $devolucion) {
                                echo "Hoy se entrega el libro";
                              }
                               ?></td>
                              <td>
                                <input type="button" id="<?php echo $libros['id_libro'];?>" class="btn btn-primary" data-toggle="modal" data-target="#ModalRegistro" value="Registrar adeudo"/>
                              </td>
                            </tr>
                       <?php
                     }}
                     ?>
                      </tbody>
                          
                    </table>
                   </td>
                 </tr>
                 <?php
               }
             }
           }catch(Exception $e){
            var_dump($e->getMessage());
          }
          ?>
          </tbody>
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