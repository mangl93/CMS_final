<div class="row justify-content-between" id="cabecera">
      
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

        <a class="navbar-brand logo-font mt-2" href="principal.php" id="brand">
            <img src="iconos/logo.png" width="60px">
            
        </a>
        <!-- links toggle -->
        <button class="navbar-toggler order-first" type="button" data-toggle="collapse" data-target="#links" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>

        </button>
        <!-- account toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#account" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            
            <i class="fa fa-envelope fa-1x" aria-hidden="true"></i>
            <span class="badge badge-light">
            
            <?php 
            include("admin/mensajes.php");
            echo $mensajes;
            ?>

          </span>
        </button>
        
        <div class="collapse navbar-collapse" id="links">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mi informacion
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="editarusuarios.php">Mis datos</a>
                    <a class="dropdown-item" href="pedidos.php">Mis pedidos</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="consultar-disp.php">Reservar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="articulos.php">Comprar</a>
                </li>

            </ul>
        </div>
        <div class="collapse navbar-collapse" id="account">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mt-2"><a class="nav-link" href="mensajes.php"><i class="fa fa-envelope fa-1x mr-3" aria-hidden="true"></i>Mensajes
                
                </a></li>
                <a href="cerrarsesion.php"><img class="mt-2" src="iconos/logoff.png" height="40px"></a>
            </ul>
        </div>
    </div>
</nav>

</div>