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
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item navbar-right">
                <a class="nav-link" href="<?php echo base_url()?>index.php/login/logout"><i class="fas fa-sign-out-alt"></i>Salir de sesión<span class="sr-only"></span></a>
            </li>
        </ul>      
    </div>
</nav>
