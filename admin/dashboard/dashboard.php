<?php 
session_start();
if ($_SESSION['tipo']!='root') {
    session_destroy();
    header ("Location: ../../index.php");
}   
?>

    <!doctype html>
    <html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../../admin.css">
  
  <link rel="shortcut icon" href="../../iconos/logo.png" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <script type="text/javascript" src="http://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
  <script src="../../code/highcharts.js"></script>
  <script src="../../code/highcharts-more.js"></script>

<script type="text/javascript" src="http://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
  <title>Hello, world!</title>
</head>

<body>

    <?php 



    include("adm.php");
    include("numusu.php");
    include("numped.php");
    include("numres.php");
    include("nummes.php");
    include("fusioncharts.php");
    include("diagrama1.php");
    include("diagrama2.php");
    include("diagrama3.php");
    
    ?>

<div class="container-fluid">
    
  
            <div class="row">
                <div class="col-1 mt-3">
                    <a href="../usuarios-admin.php"><img src="../../iconos/admin1.png" width="100px"></a>
                </div>
                <div class="col-8 mt-5 ml-5" >
                    <h4 >Logeado como : <?php echo $nombre; ?></h4>
                </div>
                <div class="col-2">
                    <div id="reloj"></div>
                </div>
    </div>
    <div class="row resumen">
        <div class="col-2" >
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Usuarios</h5>
                    <img src="../../iconos/usuarios-blanco.png" width="80px">
                    <span class="float-right"><h1><?php echo $usuarios ?></h1></span>
                </div>
            </div>
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Reservas</h5>
                    <img src="../../iconos/calendario1.png" width="80px">
                    <span class="float-right"><h1><?php echo $reservas ?></h1></span>
                </div>
            </div>
        </div>
        <div class="col-2" >
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Pedidos</h5>
                    <img src="../../iconos/carrito.png" width="80px">
                    <span class="float-right"><h1><?php echo $pedidos ?></h1></span>
                </div>
            </div>
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Mensajes</h5>
                    <img src="../../iconos/mensaje.png" width="80px">
                    <span class="float-right"><h1><?php echo $mensajes ?></h1></span>
                </div>
            </div>
        </div>
        <div class="col-4" id="chart-1"></div>
        <div class="col-3" id="chart-2"></div>
        </div>
        <div class="row">
            <div class="col-5" id="chart-3"></div>
           
            
            <div class="col-6 mb-2">
                <?php include("tabla.php") ?>
            </div>
        </div>
        
                           
    </div>
    

       
    </div>

            
     <?php 
     include("reloj.php");
     ?>      

</body>

<html>