

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<meta charset="utf-8">

<div class="row justify-content-between" id="cabecera">
      
<nav class="navbar navbar-expand-lg navbar-light bg-secondary fixed-top">

        <a class="navbar-brand logo-font mt-2" href="dashboard/dashboard.php" id="brand">
            <img src="../iconos/dashboard.png" width="60px">
        
        </a>
        <button class="navbar-toggler order-first" type="button" data-toggle="collapse" data-target="#links1" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>

        </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#account1" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            
            <i class="fa fa-envelope fa-1x" aria-hidden="true"></i>
            <span class="badge badge-light">
            
            <?php 
            include("mensajes.php");
            echo $mensajes;
            ?>

          </span>
        </button>
        
        <div class="collapse navbar-collapse" id="links">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                    <a class="nav-link" href="usuarios-admin.php">Usuarios          
                    <i class="fa fa-user fa-1x" aria-hidden="true"></i></a>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reservas-admin.php">Reservas
                    <i class="fa fa-bell fa-1x" aria-hidden="true"></i></a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pedidos-admin.php">Pedidos
                    <i class="fa fa-clipboard fa-1x" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pistas-admin.php">Pistas
                    <i class="fa fa-archive fa-1x" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="articulos-admin.php">Articulos
                    <i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i></a>
                </li>

            </ul>
        </div>
        <div class="collapse navbar-collapse" id="account">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="mensajes-admin.php?mensajes">Mensajes
                <i class="fa fa-envelope fa-1x" aria-hidden="true"></i>
                </a></li>
                <li class="nav-item"><a class="nav-link" href="../cerrarsesion.php">Log out</a></li>
            </ul>
        </div>
    </div>
</nav>

</div>

