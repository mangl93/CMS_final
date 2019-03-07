<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
<style>
        body {
          font-family: 'Roboto', sans-serif;
          font-size: 18px;
          color: black;
        }
      </style>
    <?php
    
    session_start();
    include("header.php");
    if (!isset($_SESSION['cod'])) {
        header("Location: index.php");
    }
    ?>


         
    <div class="container-fluid background">
      <div class="row justify-content-around" id="tercero">
        <div id="cuadro1" class="col-md-3 ">  
        <div class="card" style="color:black;">
        <div class="card-header">
            <img src="iconos/reloj.png" ><b>
            Informacion</b><br><br>
        </div>
        <div class="card-body">    
        <?php include("includes/datosusu.php");  ?>   
        </div>
        </div>

        <div id="cuadro2" class="col-md-3 ">
        <div class="card" style="color:black;">
        <div class="card-header">
            <img src="iconos/diagrama.png" ><b>
            Reservas</b><br><br>
        </div>
        <div class="card-body">       
        <?php include("includes/datosres.php");  ?> 

            </div>
            </div>    
        </div>
        <div id="cuadro3" class="col-md-3 "> 
            <div class="card" style="color:black;">
                <div class="card-header">
                    <img src="iconos/calendario.png" ><b>
                    Pedidos</b><br><br>
                </div>
            <div class="card-body">   
                <?php include("includes/datosped.php");  ?> 

                        
        </div>
       </div>
      </div>
 
    </div>

      <?php
      include("includes/footer-admin.html");
      ?>




    </body>

</html>
