<?php 
session_start();

if ($_SESSION['tipo']!='root') {
    session_destroy();
    header ("Location: ../index.php");
}
ob_start();

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
 
</head>

<body>
    <style>
        body {
          font-family: 'Roboto', sans-serif;
          font-size: 18px;
          background-color: grey;
          color:black;
        }
      </style>
  <div class="row justify-content-between" id="cabecera">
    <?php
    include("header-admin.php");

    
    ?>

    </div>
         
    <div class="container-fluid background">

    <div class="row justify-content-center" id="tercero">
        
 
    <div class="row ">
  
         
  
          <div class="col-lg-12 text-left">
          <?php if (!isset($_POST["usuario"])) : ?>

            <form role="form" method="post" enctype="multipart/form-data">
  
              <div class="form-group row">
  
  
                <label for="display_name" class="col-form-label">
                <h6>Usuario</h6></label>
  
                  <div class="col-lg-12 text-left">
  
                      <select class="form-control" name="usuario">
  
                          <?php
                              
                            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                            $connection->set_charset("utf8");

                            if ($connection->connect_errno) {
                                printf("Connection failed: %s\n", $connection->connect_error);
                                exit();
                            }
                            $query="select * from Usuarios";
                            if ($result = $connection->query($query)) {
                                while($obj = $result->fetch_object()) {
                                
                                    echo "<option value=".$obj->CodUsu.">".$obj->Nombre." ".$obj->Apellidos."</option>";
                                }
                            }
                          ?>
  
                      </select>
                  </div>
  
              </div>   
  
          
  
              <div class="form-group row">
  
  
                <label for="display_name" class="col-form-label"><h6>Pista</h6></label>
  
                  <div class="col-lg-12 text-left">
  
                      <select class="form-control" name="pista">
  
                          <?php
                              
                            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                            $connection->set_charset("utf8");

                            if ($connection->connect_errno) {
                                printf("Connection failed: %s\n", $connection->connect_error);
                                exit();
                            }
                            $query="select * from Pistas";
                            if ($result = $connection->query($query)) {
                                while($obj = $result->fetch_object()) {
                                
                                    echo "<option value=".$obj->CodPis.">".$obj->tipo."</option>";
                                }
                            }
                          ?>
  
                      </select>
                  </div>
  
              </div> 
  
              <div class="form-group row clearfix">
  
  
                  
  
                      <div class="col-lg-6 text-left ">
                      <label for="display_name" class="col-form-label"><h6>Dia</h6></label>
                      <input class="mr-2" type="date" name="dia">
                      </div>
                      <div class="col-lg-6 text-right ">
                      <label for="size" class="col-form-label"><h6>Hora</h6></label><br>
                      <input type="time" name="hora">
                      </div>
                      
              </div>

              <div class="form-group row">
  
                  <div class="col-lg-12 text-left ">
  
                      <input type="submit" class="form-control btn btn-info" placeholder>
      
                  </div>
  
              </div>
                      
              </div>
  
  
              </form>
              <?php else:  ?>
                
                <?php
                    $usuario = $_POST['usuario'];
                    $pista = $_POST['pista'];
                    $dia = $_POST['dia'];
                    $hora = $_POST['hora'];

                    $query = "select * from Reservas where CodPis = '$pista' and
                    fecha = '$dia' and hora = '$hora';";

                    $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                    $connection->set_charset("utf8");

                    if ($result = $connection->query($query)) {

                        if ($result->num_rows == 1 ) {
                        echo "La pista está alquilada";
                    
                        }
                        else{

                            $query = "insert into Reservas(CodUsu,CodPis,fecha,hora) 
                            values ('$usuario','$pista','$dia','$hora')";
                            
                            if ($result = $connection->query($query)) {
                                header("Location: reservas-admin.php");
                            }
                        }
                    }
 


                ?>

              <?php endif ?>


  
  
        </div>
  
  
  
 



        <?php ob_end_flush(); ?>
    </body>

</html>