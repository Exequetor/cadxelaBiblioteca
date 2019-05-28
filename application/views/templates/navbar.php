<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">      
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/welcome">Inicio <span class="sr-only"></span></a>
            </li>  
        	<li class="nav-item">
        		<a class="nav-link" href="<?php echo base_url()?>index.php/estudiantes">Estudiantes<span class="sr-only"></span></a>
        	</li> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Libros
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url()?>index.php/libros">Ver todos</a>
                    <a class="dropdown-item" href="<?php echo base_url()?>index.php/libros/registro">Agregar</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Adeudos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="<?php echo base_url()?>index.php/adeudos">Registrar adeudo</a>
                    <a class="dropdown-item" href="<?php echo base_url()?>index.php/adeudos/insertar">Ver adeudos</a>
                </div>
            </li>
            <li class="nav-item">
                <form method="POST" action="<?=base_url()?>index.php/adeudos_Controller/adeudos"?>">
                    <input type="hidden" name="b_adeudo" value="0000000001">
                    <button type="submit" class="btn btn-link" style="color: rgba(255,255,255,.5);"> Mis adeudos </button>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/empleado_controller">Empleados<span class="sr-only"></span></a>
            </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item navbar-right">
                <a class="nav-link" href="<?php echo base_url()?>index.php/login/logout"><i class="fas fa-sign-out-alt"></i>Salir de sesión<span class="sr-only"></span></a>
            </li>
        </ul>      
    </div>
</nav>
