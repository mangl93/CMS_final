<?php 
session_start();
if ($_SESSION['tipo']!='root') {
    session_destroy();
    header ("Location: ../index.php");
}   
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
<?php 

       
            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

        ?>




      <?php if (!isset($_POST["cod"])) : ?>
        <?php
        
         
            $query="select * from Usuarios where CodUsu=".$_GET['cod'];
            if ($result = $connection->query($query)) {
                while($obj = $result->fetch_object()) {
                
                $CodUsu=$obj->CodUsu;
                $Nombre=$obj->Nombre;
                $Apellidos=$obj->Apellidos;
                $Direccion=$obj->Direccion;
                $pass=$obj->pass;
                }
            }

        ?>
        
        <form method="post">
        
        <fieldset>
            <div class="card" style="color:black;">
            <div class="card-header bg-secondary" style="color:white;"><legend>USUARIO  <?php echo $CodUsu ?></legend></div>
           
            <p class="col-10 mt-1">SEGURO QUE QUIERE ELIMINAR EL USUARIO <?php echo $CodUsu ?>?  </p>
            <input type="hidden" name="cod" value="<?php echo $CodUsu ?>">
            <select class="form-group col-6 ml-3" name="sel">
                <option>si</option>
                <option>no</option>
            </select>
            <br>
            <center><p><input class="btn btn-secondary mt-3" type="submit" value="Confirmar"></p></center>
          </fieldset>
          </div>
         
        </form>

      <?php else:  ?>
      
      <?php 

      
      $connection = new mysqli("localhost", "tf", "123456", "proyecto");
      $connection->set_charset("utf8");

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      if ($_POST['sel']=='si') {
        
        $query="Delete from Usuarios where CodUsu='".$_POST['cod']."';";
        if ($result = $connection->query($query)) {
            
            echo "<div class='card' style='color:black;'>";
            echo "<div class='card-header bg-secondary'>";
            echo "Eliminar usuario";
            echo "</div>";
            echo "<div class='card-body'>";
            echo "Usuario nº ".$_POST['cod']." eliminado";
            echo "</div>";
            echo "<div class='card-footer'>";
            echo "<button><a href='usuarios-admin.php'>Volver</a></button>";
            echo "</div>";
            }
          
            } else {
                echo "<button><a href='usuarios-admin.php'>Volver</a></button>";
            }
           
           ?>
       
     

      <?php endif ?>
              </div>
  
  
  
 




  </body>

</html>
